@extends('layouts.app')
@section('content')
   

   
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="form-group">
      
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control"  placeholder="Title">
            </div>
        

     
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" >
            </div>
        



    
            <div class="form-group">
            <strong>Category:</strong>
            <select name="category">
                <option value="#">Select</option>
               <option value="Life Style">Life Style</option>
               <option value="Social awareness">Social awareness</option>
               <option value="Sports">Sports</option>
               <option value="Science">Science</option>
               <option value="Education">Education</option>
               <option value="Travel">Travel</option>
               <option value="Music">Music</option>
            </select>
            </div>
     


        
            <div class="form-group">
                <strong>Contents:</strong>
                <textarea class="form-control" style="height:150px; " name="content" placeholder="Contents"></textarea>
            </div>

      
         
        
            <div class="form-group">
                <strong>Date:</strong>
                <input type="Date" name="published_at" class="form-control" placeholder="date">
            </div>
        


        <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection

