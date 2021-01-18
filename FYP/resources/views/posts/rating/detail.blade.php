<div class="container" style="padding-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="box-shadow:-5px 2px;">
                <div class="card-header" style="background-color: #3A0B37;color: white;">
                    <h1>Rating Details</h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div><label for="rating">Rating: </label><span name="rating">{{ $rating->rating }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .button {
        background-color: #3A0B37;
        border-radius: 5px;
        border: none;
        color: white;
        padding: .375rem .75rem;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    a:link {
        text-decoration: none;
    }

    a:visited {
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
        color: white;
    }

    a:active {
        text-decoration: none;
    }

</style>
