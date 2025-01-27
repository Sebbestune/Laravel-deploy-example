<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card-body">

                    @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                    @endsession

                    {{ $post->body }}

                    <h4 class="mt-4">Comments:</h4>

                    <form method="post" action="{{ route('posts.comment.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body" placeholder="Write Your Comment..."></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group text-end">
                            <button class="btn btn-success mt-2"><i class="fa fa-comment"></i> Add Comment</button>
                        </div>
                    </form>

                    <hr />
                    @include('posts.comments', ['comments' => $post->comments, 'post_id' => $post->id])

                </div>
            </div>
        </div>
    </div>
</x-app-layout>