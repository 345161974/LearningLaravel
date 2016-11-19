<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 2016/11/16
 * Time: 下午11:14
 */

namespace App\Repositories;

use Image;

use App\Project;

class ProjectsRepository
{

    public function newProject($request) {
        //dd($request);
//        return $request->user();
        $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail'=> $this->thumbnail($request)
        ]);
        //return $request->name;
//        return "我被访问了";
    }


    public function thumbnail($request) {
        if ($request->hasFile('thumbnail')) {
            $file = $request->thumbnail;
            $name = str_random(10).'.jpg';
            $path = public_path().'/thumbnails/'.$name;
            Image::make($file)->resize(261, 98)->save($path);

            return $name;
        }
    }

    public function updateProject($request, $id) {
        $project = Project::findOrFail($id);
        $project->name = $request->name;
        if ($request->hasFile('thumbnail')) {
            $project->thumbnail = $this->thumbnail($request);
        }
        $project->save();
    }
}