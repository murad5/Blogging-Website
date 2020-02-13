@extends('layouts.main')
@extends('layouts.app')
@section('feature')
 <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

           <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img src="/images/{{$post->image}}"
                         >
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    {{ $post->title }}
                </h1>
                <ul class="entry__header-meta">
                     <li class="byline">
                        By
                        {{$post->user->name}}
                    </li>
                    <li class="date">Published:{{$post->published_at}}</li>
                    <li class="date">
                        Catergories: {{$post->category}}
                    </li>
                   
                </ul>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap">{{$post->content}}</p>
                
                
            </div>
        </article>

        <div class="comments-wrap">
        
          <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="col-full">
                 <fieldset>

              
                <form  action="/posts/{{$post->id}}/create_comment" method="POST">
                @csrf 
                            <div class="message form-field">
                                <input  name="content"  class="full-width" style="height: 100px" placeholder="Your Comment">
                            </div>

                            <input name="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

                       
                    </form> 
                  
                  </fieldset>
                </div>
               
            </div> 
            
            <div id="comments" class="row">
                <div class="col-full">
                   <fieldset>
                    <h3 class="h2" style="font-style: italic;">{{count($comments)}} Comments</h3>

                    <!-- START commentlist -->
                    <ol class="commentlist">

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                
                            </div>

                            <div class="comment__content">
                             @foreach($comments as $comment)

                                <div class="comment__info">
                                    <div class="comment__author">{{$comment->user->name}}</div> 

                                </div>

                                <div class="comment__text">
                                <p>{{$comment->content}} </p>
                                </div>
                              @endforeach
                            </div>

                        </li> 

                       
                    </ol>
                    </fieldset>
                </div> 
            </div> 
            
            

            

        </div> <!-- end comments-wrap -->

    </section>
    @endsection