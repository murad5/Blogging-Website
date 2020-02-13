@extends('layouts.main')
@extends('layouts.app')

@section('feature')

    <section class="s-content">
        
        <div class="row entries-wrap wide">
            
            <div class="entries">
            @foreach ($posts as $post)    

                <article class="col-block">
                    
                    <div class="item-entry" data-aos="zoom-in">
                      <div class="item-entry__thumb">
                            <a href="#" class="item-entry__thumb-link">
                                <img src="/images/{{$post->image }}">
                            </a>
                        </div> 
        
                        <div class="item-entry__text">    
                            <div class="item-entry__cat">
                                <a href="/show/{{$post->id}}">{{$post->category}}</a> 
                            </div>
                           
                              <h1 class="item-entry__title"><a href="/show/{{$post->id}}">{{$post->title}}</a></h1>
                                
                            <div class="item-entry__date">
                                {{$post->published_at}}
                            </div>
                        </div>
                    </div> <!-- item-entry -->

                </article> <!-- end article -->
                 @endforeach 
            </div>

        </div>
    </section> 

@endsection

