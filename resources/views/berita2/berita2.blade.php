<x-app-layout>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="card-title fw-semibold mb-4">About Food</h5>

                  <!-- Awal Card Body Galeri Berita -->
                  <div class="album py-5 bg-light">
                        <div class="container">
                        
                        <div class="row">
                            @foreach ($hasil->articles as $p)
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                        <a data-fancybox="gallery" href="{{ $p->urlToImage }}">
                                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap" src="{{ $p->urlToImage }}" width="300" height="200">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text" style="text-align: justify;">{{$p->description}}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-outline-secondary" href="{{$p->url}}" role="button" target="_blank">View</a>
                                                </div>
                                                <small class="text-muted">{{$p->publishedAt}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                  </div>
                  <!-- Akhir Card Body Galeri Berita -->

                </div>
                
                
              </div>
            </div>
          </div>
        </div>

</x-app-layout>