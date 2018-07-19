<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TestSkill;
use App\Test;
use Illuminate\Http\Request;

class TestSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $testskills = TestSkill::latest()->paginate($perPage);
        } else {
            $testskills = TestSkill::latest()->paginate($perPage);
        }

        $tests = Test::all();
        
        return view('admin.page.testskills.index', ['tests' => $tests, 'testskills' => $testskills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.page.testskills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        TestSkill::create($requestData);

        return redirect()->action('TestSkillController@index')->with('flash_message', 'Test Skill added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $testskill = TestSkill::findOrFail($id);

        return view('admin.page.testskills.show', compact('testskill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $testskill = TestSkill::findOrFail($id);

        return view('admin.page.testskills.edit', compact('testskill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $testskill = TestSkill::findOrFail($id);
        $testskill->update($requestData);

        return redirect()->action('TestSkillController@index')->with('flash_message', 'TestSkill updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        TestSkill::destroy($id);

        return redirect()->action('TestSkillController@index')->with('flash_message', 'TestSkill deleted!');
    }

    public function getTests($id){
        return response()->json(Test::where('testskill_id', $id)->get());
    }
}
