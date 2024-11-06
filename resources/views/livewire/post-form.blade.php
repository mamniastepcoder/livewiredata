<div>
    <form wire:submit.prevent="submit">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" wire:model="title" required>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" class="form-control" wire:model="content" required></textarea>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
     <!-- Posts Table -->
    <h2 class="mt-4">All Posts</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content, 50 }}</td>
                    <td>{{ $post->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
