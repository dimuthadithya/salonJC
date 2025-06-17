<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with(['user', 'booking'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function togglePublish(Feedback $feedback)
    {
        $feedback->update([
            'is_published' => !$feedback->is_published
        ]);

        return back()->with('success', 'Feedback publish status updated successfully!');
    }
}
