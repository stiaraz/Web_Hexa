@extends('layouts.index')

@section('liatkategori')
<div id="slider" class="sl-slider-wrapper demo-2">
        <div class="sl-slider">
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"><img class="card-img-top" src="{{asset('flattern/img/2.2.png')}}" alt="" width="100%" height="80%">
              </div>
              
            </div>
          </div>
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"><img class="card-img-top" src="{{asset('flattern/img/2.2.png')}}" alt="" width="100%" height="180px">
              </div>
              
            </div>
          </div>
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"><img class="card-img-top" src="{{asset('flattern/img/2.jpg')}}" alt="" width="100%" height="180px">
              </div>
              
            </div>
          </div>
          
        </div>
        <!-- /sl-slider -->
        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          
        </nav>
      </div>
    <img src="{{asset('flattern/img/hdr2.png')}}" style="margin-left: 420px; margin-top: 1px;">
      <div class="container">

        <div class="row">
          
          <div class="big-cta">
          <h4 class="heading" style="text-align: center; margin-bottom: 5px; margin-top: 5px;font: 200 50px/1.3 'Berkshire Swash', Helvetica, sans-serif;
  color: #2b2b2b;
  text-shadow: 1px 1px 0px #ededed, 2px 2px 0px rgba(0,0,0,0.15);"> <strong>Articles</strong></h4>
          <div class="progress progress-striped active" style="height: 6px; width: 70%; margin-left: 200px;">
            <div class="bar bar-info bar35"></div>
            <div class="bar bar-success bar30"></div>
            <div class="bar bar-warning bar20"></div>
            <div class="bar bar-danger bar15"></div>
          </div>
        </div>
        </div>
      </div>
    
<section id="content">
      <div class="container">
        <div class="row">
          <div class="span4">
            
            <aside class="left-sidebar">
              <div class="widget">
              </div>
              <div class="widget">
                <h5 class="widgetheading" style="font: 70 20px/1.3 Helvetica, sans-serif;
  color: #2b2b2b;
  text-shadow: 1px 1px 0px #ededed, 2px 2px 0px rgba(0,0,0,0.15);">Categories</h5>
                <ul class="cat">
                  @foreach($kategori as $k)
                  <strong><li><i class="icon-angle-right"></i><a href="{{ url('view-kategori', array($k->kategori_art)) }}">{{$k -> kategori_art}}</a><span> ({{$k -> jumlah}})</span></li></strong>
                  @endforeach
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading"style="font: 70 20px/1.3 Helvetica, sans-serif;
  color: #2b2b2b;
  text-shadow: 1px 1px 0px #ededed, 2px 2px 0px rgba(0,0,0,0.15);">Latest posts</h5>
                <ul class="recent">
                  @foreach($post2 as $po)
                  <li>
                    <img src="{{asset('articlesimage/'. $po->gambar_art)}}" class="pull-left" alt="" style="width: 65px; height: 65px; "/>
                    <h6><a href="#">{{$po ->judul_art}}</a></h6>
                    <p>
                      {!! str_limit($po->isi_art,100) !!}
                    </p>
                  </li>
                   @endforeach
                </ul>
              </div>
              
            </aside>
           
          </div>
          <div class="span8">
           
            @if($post->count())
            @foreach($post as $p)
            <article>
              <div class="row">
                <div class="span8">
                	@auth
                	<ul class="nav topnav" style="margin-bottom: 0px">
                    <li class="dropdown"  style="margin-left: 750px;">
                      <i class="icon-rounded icon-angle-down icon-32 "></i>
                      <ul class="dropdown-menu">
                          <li><a href="{{ url('edit-article', array($p->id_art)) }}">Edit</a></li>
                          <li><a href="{{ url('delete-article', array($p->id_art)) }}">Delete</a></li>
                      </ul>
                    </li>
                  </ul>
                  @else
                  @endauth
                  <div class="post-image">
                    <div class="post-heading">
                      <i class="icon-quote-left"><h3 style="font: 90 45px/1.3 'Lobster Two';
  color: #2b2b2b;
  text-shadow: 1px 1px 0px #ededed, 2px 2px 0px rgba(0,0,0,0.15);"><a href="#">{{$p ->judul_art}}</a></h3></i>
                    </div>
                    <img class="card-img-top" src="{{asset('articlesimage/'. $p->gambar_art)}}" alt="{{ $p->isi_art }}" width="100%" height="180px" style="width: 60%; height: auto; margin-left: 120px;">
                  </div>
                  <blockquote>
                     {!! str_limit($p->isi_art,300) !!}<i class="icon-quote-right"></i>
                </blockquote>
                   
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-user"></i><a href="#"> {{$p->users->name}}</a></li>
                      <li><i class="icon-calendar"></i><a href="#"> {{ date('d/m/Y', strtotime($p->created_at)) }}</a></li>
                      <li><i class="icon-tags"></i><a href="#"> {{$p ->kategori_art}}</a></li>
                    
                    </ul>
                  </div>
                </div>
              </div>
            </article>
            @endforeach
            @endif
            @auth
            <div class="pagination">{!! $post->render() !!}</div>
            @else
           <div class="cta floatright">
                <a class="btn btn-medium btn-theme btn-rounded" href="#mySignin" data-toggle="modal"><i class="icon-book"></i> View More </a>

            @endauth  
          </div>
          </div>
        </div>
      </div>
    </section>

@endsection