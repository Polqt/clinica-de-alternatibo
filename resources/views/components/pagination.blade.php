@props(['paginator'])

<div class="p-4 border-t border-slate-200 dark:border-slate-700 flex items-center justify-between">
    <div class="text-sm text-slate-600 dark:text-slate-400">
        Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} of {{ $paginator->total() }} results
    </div>
    <div class="flex items-center space-x-2">
        @if ($paginator->onFirstPage())
        <flux:button variant="outline" size="sm" disabled>
            <flux:icon.chevron-left class="h-4 w-4" />
            Previous
        </flux:button>
        @else
        <a href="{{ $paginator->previousPageUrl() }}">
            <flux:button variant="outline" size="sm">
                <flux:icon.chevron-left class="h-4 w-4" />
                Previous
            </flux:button>
        </a>
        @endif

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">
            <flux:button variant="outline" size="sm">
                Next
                <flux:icon.chevron-right class="h-4 w-4 ml-1" />
            </flux:button>
        </a>
        @else
        <flux:button variant="outline" size="sm" disabled>
            Next
            <flux:icon.chevron-right class="h-4 w-4 ml-1" />
        </flux:button>
        @endif
    </div>
</div>