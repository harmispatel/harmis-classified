@foreach ($property as $showProperty)

<div class="post-wrap col-lg-6 col-md-6">
    <div class="post-item card ">
        <a href="#" class="img-inr">
            <img src="{{ asset ('image/house1.png')}}" class="img-fluid card-img " alt="">
            <div class="img-pri-abo">
                <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. {{$showProperty->price}}</strong></h3>
            </div>
            <div class="re-img">
                <div class="re-text">
                    <span>
                        {{ $showProperty['status'] == 0 ? 'Inactive' : 'Active' }}
                    </span>
                </div>
            </div>
        </a>
        <div class="card-body jo-card">
            <div class="jo-card-bor">
                <h3 class="card-title mb-1"><a href="#">{{$showProperty->name}}</a></h3>
                <p class="post-item-text font-weight-light font-sm">{{$showProperty->hasOneCountry['name']}}, {{$showProperty->hasOneState['name']}}, {{$showProperty->address}}</p>
            </div>

        </div>
    </div>
</div>
@endforeach
