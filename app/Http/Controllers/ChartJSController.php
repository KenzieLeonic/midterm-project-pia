<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Process;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class ChartJSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //type data
        $type_total_raw = DB::raw('count(*) as count');
        $group_types = Type::getQuery()
            ->select('name', $type_total_raw)
            ->groupBy('name')
            ->pluck('count', 'name');

        $types_labels = $group_types->keys();
        $types_dataset = $group_types->values();

        //tags data

        $tag_total_raw = DB::raw('count(*) as count');
        $group_tags = Tag::getQuery()
            ->select('name', $tag_total_raw)
            ->groupby('name')
            ->pluck('count', 'name');

        $tags_labels = $group_tags->keys();
        $tags_dataset = $group_tags->values();

        //processes data
        $process_total_raw = DB::raw('count(*) as count');
        $group_processes = Process::getQuery()
            ->select('name', $process_total_raw)
            ->groupby('name')
            ->pluck('count', 'name');

        $processes_labels = $group_processes->keys();
        $processes_dataset = $group_processes->values();

        return view('admin.index', compact('types_labels', 'types_dataset',
            'tags_labels','tags_dataset',
        'processes_labels','processes_dataset'));
    }
}
