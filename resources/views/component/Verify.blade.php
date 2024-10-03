<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Verification</h3>
                        </div>
                            <div class="form-group mb-3">
                                <input id="code" type="number" required="" class="form-control" name="email" placeholder="Verification Code">
                            </div>
                            <div class="form-group mb-3">
                                <button onclick="verify()" type="submit" class="btn btn-fill-out btn-block" name="login">Confirm</button>
                            </div>
                            <button onclick="back()" type="submit" class="btn btn-fill-out btn-dark btn-block" name="back">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    async function verify() {
    let code = document.getElementById('code').value;
    let email = sessionStorage.getItem('email');

    if (code.length === 0) {
        errorToast("Code Required");
    } else {
        $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
        try {
            let res = await axios.get("/VerifyLogin/" + email + "/" + code);
            if (res.status === 200) {
                if (sessionStorage.getItem("last_location")) {
                    window.location.href = sessionStorage.getItem("last_location");
                }else{
                    window.location.href = "/";
                }
            }
        } catch (err) {
            errorToast("Incorrect Code...");
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');

            // setTimeout(() => {
            //     window.location.href = "/login";
            // }, 1000);
        }
        }
}
async function back() {
    window.location.href = sessionStorage.getItem("login_page");
}

</script>

