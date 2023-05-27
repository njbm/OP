<?php

namespace BITM\SEIP12;

use BITM\SEIP12\Config;

class Slider{

    public $id = null;
    public $uuid = null;
    public $src = null;
    public $alt = null;
    public $title = null;
    public $caption = null;




    //reading all
    public function index(){

        $dataSlides = file_get_contents(Config::datasource().'slideritems.json');
        $slides = json_decode($dataSlides);

        return $slides;
    }

    public function create(){
        
    }

    public function store($data){
        $result = false;

        $dataSlides = file_get_contents(Config::datasource().'slideritems.json');
        $slides = json_decode($dataSlides);
        
       
        $slides[] = (object) (array) $data; // data is a slider object
        
        

        if(file_exists(Config::datasource()."slideritems.json")){
            $result = file_put_contents(Config::datasource()."slideritems.json",json_encode($slides));
        }else{
            echo "File not found";
        }

        return $result;

    }


    public function show($id){
        /** communicate with datasource and get data for that id */
        $dataSlides = file_get_contents(Config::datasource().'slideritems.json');
        $slides = json_decode($dataSlides);
        
        $slide = null;
        foreach($slides as $aslide){
            if($aslide->id == $id){
                $slide = $aslide;
                break;
            }
        }
        return $slide;
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){ //completely removed
        
    }


    public function trash(){
        
    }

    public function delete(){ //soft delete
        
    }


    public function pdf(){
        
    }


    public function xl(){
        
    }


    public function word(){
        
    }

    public function last_highest_id(){

        $curentUniqueId = null;

        $dataSlides = file_get_contents(Config::datasource().'slideritems.json');
        $slides = json_decode($dataSlides);

        if(count($slides) > 0){
            // finding unique ids
            $ids = [];
            foreach($slides as $aslide){
                $ids[] = $aslide->id;
            }
            sort($ids);
            $lastIndex = count($ids)-1;
            $highestId = $ids[$lastIndex];

            $curentUniqueId = $highestId+1;
        }else{
            $curentUniqueId = 1;
        }

        return $curentUniqueId;
    }

    public function prepare($src,$title, $caption, $alt){
        $slider = new Slider();
        $slider->id = $this->last_highest_id();
        $slider->uuid = uniqid();
        $slider->src = $src;
        $slider->title = $title;
        $slider->caption = $caption;
        $slider->alt = $alt;

        return $slider;
    }

}

