<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.index');
    }

    /**
     * Ajax reques for all Courses.
     */
    public function dataTable()
    {
        $query = Course::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(Mosque $mosque) {
                return '<a role="button" href="'. route('mosque.show',['mosque' => $mosque->id]).'" class="btn btn-secondary btn-sm btn-show"><i class="fa fa-eye"></i></a>
                        <a href="'.route('mosque.edit',['mosque' => $mosque->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                        <a role="button" data-id="'.$mosque->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';

            })
//            ->addColumn('activity_category_name', function(Mosque $activity) {
//                return $activity->activityCategory->name ?? '';
//            })
            ->addColumn('image', function(Mosque $mosque) {
                return '<img height="100px" src="'.asset($mosque->attachments->first()->file ?? '').'">';
            })
            ->rawColumns(['action','image'])
            ->toJson();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
