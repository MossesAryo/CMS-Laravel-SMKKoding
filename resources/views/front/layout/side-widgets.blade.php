 <!-- Side widgets-->
 <div class="col-lg-4">
     <!-- Search widget-->
     <div class="card mb-4">
         <div class="card-header">Search</div>
         <div class="card-body">
             <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search Articles..."/>
                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                </div>
             </form>
         </div>
     </div>
     <!-- Categories widget-->
     <div class="card mb-4">
         <div class="card-header">Categories</div>
         <div class="card-body">
             <div>
                 @foreach ($categories as $item)
                     <span><a href="#!" class="category bg-primary badge text-white">{{ $item->name }}</a></span>
                 @endforeach
             </div>
         </div>
     </div>
     <!-- Side widget-->
     <div class="card mb-4">
         <div class="card-header">Side Widget
    
         </div>
         <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and
             feature the Bootstrap 5 card component!
         </div>
     </div>
     </div>
 </div>
