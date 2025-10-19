<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentBlock;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContentBlockController extends Controller
{
    public function index(): View
    {
        $blocks = ContentBlock::orderBy('section')
            ->orderBy('display_order')
            ->get()
            ->groupBy('section');

        return view('admin.content-blocks.index', [
            'blocks' => $blocks,
            'title' => __('site.manage_content'),
        ]);
    }

    public function edit(ContentBlock $contentBlock): View
    {
        return view('admin.content-blocks.edit', [
            'block' => $contentBlock,
            'title' => __('site.edit_block'),
        ]);
    }

    public function update(Request $request, ContentBlock $contentBlock): RedirectResponse
    {
        $validated = $request->validate([
            'title_en' => ['nullable', 'string', 'max:255'],
            'title_ar' => ['nullable', 'string', 'max:255'],
            'subtitle_en' => ['nullable', 'string', 'max:255'],
            'subtitle_ar' => ['nullable', 'string', 'max:255'],
            'summary_en' => ['nullable', 'string'],
            'summary_ar' => ['nullable', 'string'],
            'body_en' => ['nullable', 'string'],
            'body_ar' => ['nullable', 'string'],
            'button_text_en' => ['nullable', 'string', 'max:255'],
            'button_text_ar' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'metadata.icon' => ['nullable', 'string', 'max:50'],
            'metadata.value' => ['nullable', 'string', 'max:50'],
            'metadata.address' => ['nullable', 'string', 'max:255'],
            'metadata.phone' => ['nullable', 'string', 'max:50'],
            'metadata.email' => ['nullable', 'string', 'max:255'],
            'metadata.map_url' => ['nullable', 'string', 'max:255'],
            'metadata.office_hours_en' => ['nullable', 'string', 'max:255'],
            'metadata.office_hours_ar' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
            'remove_image' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->boolean('remove_image')) {
            $contentBlock->image_path = null;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('content-blocks', 'public');
            $contentBlock->image_path = $path;
        }

        $contentBlock->fill(collect($validated)->except(['image', 'remove_image'])->toArray());
        $contentBlock->is_active = $request->boolean('is_active', true);
        $contentBlock->save();

        return redirect()
            ->route('content_blocks')
            ->with('success', __('site.block_saved'));
    }
}
