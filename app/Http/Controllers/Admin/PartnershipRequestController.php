<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\PartnershipRequest; // Make sure to create this model

class PartnershipRequestController extends Controller
{
    /**
     * Store a newly created partnership request in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'representative_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'email_number' => 'required|email|max:255',
            'mobile_number' => 'required|string|max:20', 
            'objectives' => 'nullable|array',
            'objectives.*' => 'string|max:255', 
            'project_description' => 'required|string',
            'partnership_duration' => 'required|in:short,medium,long',
            'additional_notes' => 'nullable|string',
        ]);

        // 2. Process objectives array into a comma-separated string or JSON
        // If you want to store it as a comma-separated string:
        $validatedData['objectives'] = implode(', ', $validatedData['objectives'] ?? []);

        // If you prefer to store it as JSON (recommended for arrays):
        // $validatedData['objectives'] = json_encode($validatedData['objectives'] ?? []);


        // 3. Create a new PartnershipRequest record in the database
        try {
            PartnershipRequest::create($validatedData);

            // 4. Redirect with a success message

            $notify[] = ['success', __('Your partnership request has been submitted successfully!')];
            return back()->withNotify($notify);

        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error submitting partnership request: ' . $e->getMessage());

            // Redirect back with an error message
            return back()->withInput()->withNotify(['error', __('There was an issue submitting your request. Please try again.')]);
        }
    }
}