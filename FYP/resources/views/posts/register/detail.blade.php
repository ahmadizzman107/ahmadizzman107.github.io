<div class="container" style="padding-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="box-shadow:-5px 2px;">
                <div class="card-header" style="background-color: #3A0B37;color: white;">
                    <h1>Participant Credentials</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div><label for="event_name">Event name: </label><span
                            name="event_name">{{ $participant->post->title }}</span></div>
                    <div>
                        <label for="parti_name">Participant name: </label><span>{{ $participant->name }}</span>
                    </div>
                    <div><label for="">Participant email: </label><span>{{ $participant->email }}</span></div>
                    <div><label for="">Participant phone number: </label><span>{{ $participant->phone }}</span></div>
                    <div><label for="">Current Position: </label><span>{{ $participant->position }}</span></div>
                    <div><label for="">Currnt Institution: </label><span>{{ $participant->institution }}</span></div>

                    @if (empty($participant->post->fees))
                        <div><label for="">Fees: </label><span>FOC</span></div>
                    @else
                        <div><label for="">Fees: </label><span>{{ $participant->post->fees }}</span>
                        </div>
                        <div><a href="{{ $imagePath }}" target="_blank" class="button">Show Receipt</a></div>
                    @endif
                    <div>
                        <div><strong>Validation</strong></div>
                        <div>
                            <form action={{ route('validate', $participant->id) }} method="post">
                                @csrf
                                @method('PUT')
                                <input type="radio" name="validation" id="approve" value="1">
                                <label for="approve">Approved</label><br>
                                <input type="radio" name="validation" id="denied" value="0">
                                <label for="denied">Denied</label>
                                <div>
                                    <button type="submit" class="button">Confirm</button>
                                    <button type="button" class="button" data-dismiss="modal">Back</button>
                                </div>

                            </form>
                        </div>

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
