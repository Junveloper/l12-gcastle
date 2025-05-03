<div class="space-y-4  dark:bg-gray-800 rounded-xl p-6 shadow-xl w-full max-w-2xl">
    <h2 class="text-xl font-bold text-center" style="color: {{ $titleColor ?? '#000' }}">{{ $title }}</h2>
    <div class="prose dark:prose-invert max-w-none">
        {!! $content !!}
    </div>
</div> 