<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Osiset\ShopifyApp\Facades\ShopifyApp;

class TamplateController extends Controller
{
    public function createPageTemplate(Request $request)
    {
        try {
            $shop = ShopifyApp::shop();
            $api = ShopifyApp::api();

            $title = $request->input('title');
            $bodyHtml = $request->input('body_html');

            // Create a new page using Shopify API
            $newPage = $api->rest('POST', '/admin/pages2.liquid', [
                'page' => [
                    'title' => $title,
                    'body_html' => $bodyHtml,
                    'published' => true,
                ],
            ]);

            // Handle the created page data as needed
            \Log::info('Page template created: ' . json_encode($newPage));

            return response()->json(['success' => true, 'page' => $newPage]);
        } catch (\Exception $e) {
            \Log::error('Error creating page template: ' . $e->getMessage());

            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
