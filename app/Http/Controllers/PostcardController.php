<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostcardRequest;
use App\Http\Requests\UpdatePostcardRequest;
use App\Models\Postcard;
use Illuminate\Http\Request;
use Spatie\SchemaOrg\Schema;

class PostcardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('postcards.index', [
            'postcards' => Postcard::inlineOnly(
                $request->has('search') ? $request->get('search') : null
            )
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostcardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Postcard $postcard)
    {
        if ($postcard->trashed()) {
            return redirect('postcards.index', 301)->withError('The postcard is no longer available');
        }

        $product = Schema::product()
            ->name($postcard->title)
            ->offers(
                Schema::offer()->name($postcard->title)
                ->price($postcard->price)
                ->priceCurrency('ZAR')
            );
        return view('postcards.show', ['postcard' => $postcard, 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postcard $postcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostcardRequest $request, Postcard $postcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postcard $postcard)
    {
        //
    }
}
