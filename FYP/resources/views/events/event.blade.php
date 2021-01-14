<div class="container" style="padding-top: 50px;">
    <div class="col-lg-12">
        <div class="card" style="box-shadow:-5px 2px;">
            <div class="card-header" style="background-color: #3A0B37;color: white;">{{ $post->title }}</div>
            <div class="card-body">
                <div>
                    <img src={{ $imagePath }}>
                </div>
                <div>
                    <p>{{ $post->body }}</p>
                </div>
                <div>
                    <span>Date: {{ \Carbon\Carbon::parse($post->date)->format('j F, Y') }}</span>
                    <div>
                        <span>Start Time: {{ \Carbon\Carbon::parse($post->time_start)->format('h:i A') }}</span>
                    </div>
                    <div>
                        <span>End Time: {{ \Carbon\Carbon::parse($post->time_end)->format('h:i A') }}</span>
                    </div>
                </div>
                <div>
                    <span>Location: {{ $post->location }}</span>
                </div>
                <div>
                    <span>Fees: {{ isset($post->fees) ? 'RM '.$post->fees : 'FOC' }}</span>
                </div>
                <hr>
                <small>Posted at {{ $post->created_at }}</small>
                <hr>
                <div>
                    <form action="" method="POST">
                        @csrf
                        <a data-attr="{{ route('create-event', $post->id) }}" class="button" 
                        data-target="#xLargeModal" id="xLargeButton">Register</a>
                        <button type="button" class="button" data-dismiss="modal">Back</button>
                    </form>
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
</style>