@extends('layouts.index')

@section('editart')
<div id="wrapper">
      <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span6">
            <div class="inner-heading">
              <h2>Edit your<strong> article</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            
              <div class="cta floatleft">
                <a class="btn btn-medium btn-theme btn-rounded" href="{{route('home')}}"><i class="icon-undo"></i> View Article </a>
              </div>
            <form method="post" role="form" class="contactForm" action="{{url('update-article',array($post->id_art))}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>

              <div class="row">
                <div class="span12 margintop10 form-group">
                  <label class="control-label" for="inputText"> Image </label>
                  <input type="file" id="input-file-now" class="dropify" name="gambar_art" data-default-file="{{asset('articlesimage/'. $post->gambar_art)}}"/> 
                </div>
                <div class="span12 margintop10 form-group">
                  <label class="control-label" for="inputText">  Category</label>
                 
                  <select class="form-control select2" style="width: 100%;" name="kategori_art" required="">
                    <option selected="selected">Select the category</option>
                    <option value="Activity">Activity</option>
                    <option value="Health">Health</option>
                    <option value="Education">Education</option>
                    <option value="IT">IT</option>
                    <option value="Global">Global</option>
                    <option value="Other">Other</option>
                  </select>
                  <div class="validation"></div>
                </div>
                <div class="span12 margintop10 form-group">
                  <label class="control-label" for="inputText">  Title</label>
                  <input type="text" class="form-control" id="name" placeholder="Title" data-rule="minlen:4" data-msg="Please enter title" required="" name="judul_art" value="{{ $post->judul_art }}"/>
                  <div class="validation"></div>
                </div>
                <div class="span12 margintop10 form-group">
                  <label class="control-label" for="inputText">  Description</label>
                  <textarea class="form-control" id="summary-ckeditor" name="isi_art">{{ $post->isi_art }}</textarea>
                  
                  <div class="validation"></div>
                  
                </div>
                <p class="text-center">
                  <button class="btn btn-large btn-theme margintop10" type="submit">Submit</button>
                </p>
              </div>
            </form>
          </div>
        </div>
        
      </div>

    </section>
   </div>

@endsection