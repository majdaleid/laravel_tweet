<div class="border border-gray-300 rounded-lg">
 @forelse($tweets as $tweet )
@include('tweet')
@empty
<p>No tweets yet.</p>
@endforelse

{{$tweets->links()}}
</div>
