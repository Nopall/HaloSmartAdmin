<script src="{{ asset('assets/js/helpers.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>

<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/popper.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('assets/js/hammer.js') }}"></script>
<script src="{{ asset('assets/js/menu.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@php
    $csrfToken = csrf_token();
@endphp

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const httpClient = {
        async post(url, data) {
            try {
                const response = await axios.post(url, data, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ $csrfToken }}'
                    }
                });
                return response.data;
            } catch (error) {
                throw error;
            }
        },

        async delete(url) {
            try {
                const response = await axios.delete(url, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ $csrfToken }}'
                    }
                });
                return response.data;
            } catch (error) {
                throw error;
            }
        }
    };
</script>


@stack('js')
