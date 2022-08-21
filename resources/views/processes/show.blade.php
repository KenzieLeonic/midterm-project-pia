@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="font-mono text-3xl mx-4 mt-6">
            สถานะงาน: {{ $process->name }}
        </h1>
        <p class="mx-8 mt-2">
            {{ $process->posts->count() }} posts
        </p>
        <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-left text-gray-600 dark:text-gray-400">
            <thead class="font-mono text-lg text-gray-700 bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6 text-center">รูปภาพ</th>
                    <th scope="col" class="py-3 px-6">หัวข้อเรื่อง</th>
                    <th scope="col" class="py-3 px-6">จำนวนผู้ชม</th>
                    <th scope="col" class="py-3 px-6 ">
                        <a href="{{ route('tags.index') }}">
                            ประเภทเรื่อง
                        </a>
                    </th>
                    <th scope="col" class="py-3 px-6 text-center">
                        <a href="{{ route('types.index') }}">
                            หน่วยงาน</th> 
                        </a> 
                    <th scope="col" class="py-3 px-6 text-center">
                        <a href="{{ route('processes.index') }}">
                            สถานะงาน
                        </a>
                    </th>
                </tr>
            </thead>
            
            <tbody class="m-2">
                @foreach($process->posts as $post)
                <tr class="border-t">
                    <td>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                        @if($post->image)    
                            <img src="/images/{{ ($post->image) }}" class="p-1 rounded mx-auto" height="100" width="100"/>
                        @else
                            <img src="/images/no-image.jpg" class="p-1 rounded mx-auto" height="75" width="75"/>
                        @endif
                        </a>
                    </td>
                    <td class="py-3 px-6">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="hover:underline hover:text-gray-700 ">
                        {{ $post->title }}
                        </a>
                    </td>
                    <td class="py-3 px-6"> 
                        <p class="bg-orange-100 text-gray-800 text-xs text-center font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                        <svg class="w-6 h-6 inline mr-1" viewBox="0 0 20 20">
                            <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
                        </svg>
                        {{ $post->view_count }} views
                    </td>
                
                    <td class="py-3 px-6">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('tags.show', ['tag' => $tag->name]) }}">
                                <p class="bg-gray-200 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline" viewBox="0 0 16 16">
                                        <path d="M8.39 12.648a1.32 1.32 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1.06 1.06 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.512.512 0 0 0-.523-.516.539.539 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532 0 .312.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531 0 .313.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242l-.515 2.492zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z"/>
                                    </svg>
                                    {{ $tag->name }}
                                </p>
                            </a>
                        @endforeach
                    </td>

                    <td class="py-3 px-6 text-center">
                        @foreach($post->types as $type)
                            <a href="{{ route('types.show', ['type' => $type->name]) }}">
                                <p class="bg-purple-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    {{ $type->name }}
                                </p>
                            </a>
                        @endforeach
                    </td> 

                    <td class="py-3 px-6 text-center">
                        @foreach($post->processes as $process)
                            @if($process->name == 'รอรับเรื่อง') 
                            <a href="{{ route('processes.show', ['process' => $process->name]) }}">
                                <p class="border-2 border-blue-300 text-blue-400 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    {{ $process->name }}
                                </p>
                            </a>
                            @elseif($process->name == 'ดำเนินการ') 
                            <a href="{{ route('processes.show', ['process' => $process->name]) }}">
                                <p class="border-2 border-yellow-300 text-yellow-400 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    {{ $process->name }}
                                </p>
                            </a>
                            @elseif($process->name == 'เสร็จสิ้น') 
                            <a href="{{ route('processes.show', ['process' => $process->name]) }}">
                                <p class="border-2 border-[#B3BA1E] text-[#B3BA1E] text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    {{ $process->name }}
                                </p>
                            </a>
                            @elseif($process->name == 'ไม่อนุมัติ') 
                            <a href="{{ route('processes.show', ['process' => $process->name]) }}">
                                <p class="border-2 border-red-300 text-red-400 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    {{ $process->name }}
                                </p>
                            </a>
                            @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </section>

@endsection
