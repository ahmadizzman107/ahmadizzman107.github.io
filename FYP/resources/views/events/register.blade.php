<div class="container" style="padding-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="box-shadow:-5px 2px;">
                <div class="card-header" style="background-color: #3A0B37;color: white;">Register for Event</div>

                <div class="card-body">
                    <form action="{{ route('store-register', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Name --}}
                        <div>
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your full name" size="30">
                        </div>
                        {{-- Email --}}
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter your email address"
                                size="30">
                        </div>
                        {{-- Phone --}}
                        <div>
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" size="30">
                        </div>
                        {{-- Current Position --}}
                        <div>
                            <label>Current Position</label><br>
                            {{-- Radio --}}
                            <input type="radio" id="lect" name="position" value="lecturer">
                            <label for="lect">Lecturer</label><br>
                            <input type="radio" id="teach" name="position" value="teacher">
                            <label for="teach">Teacher</label><br>
                            <input type="radio" id="research" name="position" value="researcher">
                            <label for="research">Researcher</label><br>
                            <input type="radio" id="ugstu" name="position" value="undergrad">
                            <label for="ugstu">Undergratuates Student</label><br>
                            <input type="radio" id="pgstu" name="position" value="postgrad">
                            <label for="pgstu">Postgraduates Student</label><br>
                            <input type="radio" id="schstu" name="position" value="school">
                            <label for="schstu">School Student</label><br>
                            <input type="radio" id="other" name="position" value="other">
                            <label for="other">Other</label>
                        </div>
                        {{-- Institution --}}
                        <div>
                            <label for="insti">Current Institution</label>
                            <input type="text" id="insti" name="institution"
                                placeholder="Enter your current institution" size="30">
                        </div>
                        {{-- Fees --}}
                        <div>
                            <span>Fees - {{ isset($post->fees) ? 'RM ' . $post->fees : 'FOC' }}</span>
                        </div>
                        {{-- Depo/Trans Receipt --}}
                        @if (!empty($post->fees))
                            <label for="customFile">Proof of Payment (Deposit/Transfer Receipt)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="receipt">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        @endif

                        <div style="padding-top: 30px">
                            <button type="submit" value="Register" class="button">Register</button>
                            <a data-attr="{{ route('show-event', $post->id) }}" data-target="#xLargeModal"
                                id="xLargeButton" class="button">Back</a>
                        </div>
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
