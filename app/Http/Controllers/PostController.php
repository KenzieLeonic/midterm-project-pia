<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Process;
use App\Models\Tag;
use App\Models\Type;
use App\Models\Processes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(50);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:5', 'max:1000'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
//        $post->user_id = Auth::user()->id;
        $post->user_id = $request->user()->id;

       // $path = $request->file('image')->store('public/images');
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        $post->image = $imageName;
        $post->save();

        $tags = $request->get('tags');
        $tag_ids = $this->syncTags($tags);
        $post->tags()->sync($tag_ids);

        $types = $request->get('types');
        $type_ids = $this->syncTypes($types);
        $post->types()->sync($type_ids);

        $post->processes()->sync(1);
        return redirect()->route('posts.show', [ 'post' => $post->id ]);

    }

    private function syncTypes($types)
    {
        $types = explode(",", $types);
        $types = array_map(function ($v) {
            return Str::ucfirst(trim($v));
        }, $types);

        $type_ids = [];
        foreach ($types as $type_name) {
            $type = Type::where('name', $type_name)->first();
            if (!$type) {
                $type = new Type();
                $type->name = $type_name;
                $type->save();
            }
            $type_ids[] = $type->id;
        }
        return $type_ids;
    }

    private function syncTags($tags)
    {
        $tags = explode(",", $tags);
        $tags = array_map(function ($v) {
            return Str::ucfirst(trim($v));
        }, $tags);

        $tag_ids = [];
        foreach ($tags as $tag_name) {
            $tag = Tag::where('name', $tag_name)->first();
            if (!$tag) {
                $tag = new Tag();
                $tag->name = $tag_name;
                $tag->save();
            }
            $tag_ids[] = $tag->id;
        }
        return $tag_ids;
    }

    private function syncProcesses($processes){
        $processes = explode(",", $processes);
        $processes = array_map(function ($v) {
            return Str::ucfirst(trim($v));
        }, $processes);

        $process_ids = [];
        foreach ($processes as $process_name) {
            $process = Process::where('name', $process_name)->first();
            if(!$process){
                $process = new Process();
                $process->name = $process_name;
                $process->save();
            }
            $process_ids[] = $process->id;
        }
        return $process_ids;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)       // dependency injection
    {
        if (is_int($post->view_count)) {
            $post->view_count = $post->view_count + 1;
            $post->save();
        }
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $tags = $post->tags->pluck('name')->all();
        $tags = implode(", ", $tags);

        $types = $post->types->pluck('name')->all();
        $types = implode(", ", $types);

        return view('posts.edit', ['post' => $post, 'tags' => $tags, 'post' => $post, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:5', 'max:1000']
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            // $path = $request->file('image')->store('public/images');
            // $post->image = $path;
        }
    }

}
