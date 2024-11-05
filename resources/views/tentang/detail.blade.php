<dialog id="detailKontributor1" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Chat</h3>

        <div class="chat chat-start">
            <div class="chat-image avatar">
                <div class="w-10 rounded-full">
                    <img alt="Tailwind CSS chat bubble component"
                        src="{{ asset('img/tentang/profil-inisiator-1.jpg') }}" />
                </div>
            </div>
            <div class="chat-bubble">Dzul, tolong buatin web data prestasi dong. Biar para murid bisa lihat prestasi yang diraih di sekolah ini.</div>
        </div>
        <div class="chat chat-end">
            <div class="chat-image avatar">
                <div class="w-10 rounded-full">
                    <img alt="Tailwind CSS chat bubble component" src="{{ asset('img/tentang/profil-kreator.jpg') }}" />
                </div>
            </div>
            <div class="chat-bubble">Gampang 😁👍</div>
        </div>

        <div class="modal-action flex justify-between">
            <button class="btn" type="button"
                onclick="document.getElementById('detailKontributor1').close()">Batal</button>
        </div>
    </div>
</dialog>

<dialog id="detailKontributor2" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Chat</h3>

        <div class="chat chat-start">
            <div class="chat-image avatar">
                <div class="w-10 rounded-full">
                    <img alt="Tailwind CSS chat bubble component"
                        src="{{ asset('img/tentang/profil-inisiator-2.jpg') }}" />
                </div>
            </div>
            <div class="chat-bubble">Rencananya kamu bikin web ini jadi full dark mode ya?</div>
        </div>
        <div class="chat chat-end">
            <div class="chat-image avatar">
                <div class="w-10 rounded-full">
                    <img alt="Tailwind CSS chat bubble component" src="{{ asset('img/tentang/profil-kreator.jpg') }}" />
                </div>
            </div>
            <div class="chat-bubble">Iya dong pak 😏</div>
        </div>

        <div class="modal-action flex justify-between">
            <button class="btn" type="button"
                onclick="document.getElementById('detailKontributor2').close()">Batal</button>
        </div>
    </div>
</dialog>

<dialog id="detailKontributor3" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Chat</h3>

        <div class="chat chat-start">
            <div class="chat-image avatar">
                <div class="w-10 rounded-full">
                    <img alt="Tailwind CSS chat bubble component"
                        src="{{ asset('img/tentang/profil-kreator.jpg') }}" />
                </div>
            </div>
            <div class="chat-bubble">OTW jadi software engineer aowkowkowkowk 😋</div>
        </div>

        <div class="modal-action flex justify-between">
            <button class="btn" type="button"
                onclick="document.getElementById('detailKontributor3').close()">Batal</button>
        </div>
    </div>
</dialog>

<script>
    const bukaDetailKontributor1 = () =>
        document.getElementById('detailKontributor1').showModal();

    const bukaDetailKontributor2 = () => 
        document.getElementById('detailKontributor2').showModal();

    const bukaDetailKontributor3 = () => 
        document.getElementById('detailKontributor3').showModal();
</script>
