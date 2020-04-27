class RankFormScript {
    constructor() {
    }

    init() {
        $('#rank-file_photo').change(_ => {
            const input = document.getElementById('rank-file_photo');
            if(input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const preview = document.getElementById('url_icon-container');
                    preview.classList.add('icon-container');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }
}
