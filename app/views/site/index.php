<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Sistem Informasi Kepegawaian Prabubima Tech';
?>
<style>
    body {
        background-color: lightseagreen;
    }

    h1 {
        font-size: 35px;
        color: black;
        font-family: Apple Chancery;
    }


    .box {
        width: 100px;
        height: 120px;
        display: block;
        color: peru;
        /* border: 1px solid black; */
        padding: 10px;
        margin: 10px;
        background-color: lightblue;
        border-radius: 12px;
        text-align: center;
    }

    .box:hover {
        text-decoration: none;
        color: slategray;
        box-shadow: 0 0 16px rgba(35, 173, 278, 1);
    }

    .box-center {
        text-align: center;
        margin-bottom: 6px;

    }
</style>
<div class="site-index">
    <div class="container-custom">
        <div class="row mt-3">
            <div class="col d-flex justify-content-center">
                <h1>Sistem Informasi Kepegawaian Prabubima Tech</h1>

            </div>
        </div>
        <div class="row mt-2">
            <div class="col" style="text-align: center;">
                <img src="https://prabubimatech.com/assets/image/logo.png" style="height: 250px;">
                <div class="row justify-content-center">


                    <a class="box" href="<?= Url::to(['biodata-pegawai/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                            </svg>
                        </div>
                        <span>Biodata Pegawai</span>
                    </a>
                    <a class="box" href="<?= Url::to(['riwayat-keluarga/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z" />
                            </svg>
                        </div>
                        <span>Riwayat Keluarga</span>
                    </a>
                    <a class="box" href="<?= Url::to(['master-hubungan-keluarga/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            </svg>
                        </div>
                        <span>Master Hubungan Keluarga</span>
                    </a>
                    <a class="box" href="<?= Url::to(['riwayat-pendidikan/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                            </svg>
                        </div>
                        <span>Riwayat Pendidikan</span>
                    </a>
                    <a class="box" href="<?= Url::to(['master-pendidikan-formal/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                            </svg>
                        </div>
                        <span>Master Pendidikan Formal</span>
                    </a>

                    <a class="box" href="<?= Url::to(['master-jenis-kelamin/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z" />
                            </svg>
                        </div>
                        <span>Master Jenis Kelamin</span>
                    </a>
                    <a class="box" href="<?= Url::to(['master-agama/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-magnet-fill" viewBox="0 0 16 16">
                                <path d="M15 12h-4v3h4v-3ZM5 12H1v3h4v-3ZM0 8a8 8 0 1 1 16 0v8h-6V8a2 2 0 1 0-4 0v8H0V8Z" />
                            </svg>
                        </div>
                        <span>Master Agama</span>
                    </a>
                    <a class="box" href="<?= Url::to(['master-status-perkawinan/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-infinity" viewBox="0 0 16 16">
                                <path d="M5.68 5.792 7.345 7.75 5.681 9.708a2.75 2.75 0 1 1 0-3.916ZM8 6.978 6.416 5.113l-.014-.015a3.75 3.75 0 1 0 0 5.304l.014-.015L8 8.522l1.584 1.865.014.015a3.75 3.75 0 1 0 0-5.304l-.014.015L8 6.978Zm.656.772 1.663-1.958a2.75 2.75 0 1 1 0 3.916L8.656 7.75Z" />
                            </svg>
                        </div>
                        <span>Master Status Perkawinan</span>
                    </a>
                    <a class="box" href="<?= Url::to(['jenis-pegawai/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-suitcase2" viewBox="0 0 16 16">
                                <path d="M6.5 0a.5.5 0 0 0-.5.5V3H5a2 2 0 0 0-2 2v8a2 2 0 0 0 1.031 1.75A1.003 1.003 0 0 0 5 16a1 1 0 0 0 1-1h4a1 1 0 1 0 1.969-.25A2 2 0 0 0 13 13V5a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-.5-.5h-3ZM9 3H7V1h2v2Zm3 10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7h8v6ZM5 4h6a1 1 0 0 1 1 1v1H4V5a1 1 0 0 1 1-1Z" />
                            </svg>
                        </div>
                        <span>Jenis Pegawai</span>
                    </a>
                    <a class="box" href="<?= Url::to(['unit-kerja/index']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                            </svg>
                        </div>
                        <span>Unit Kerja</span>
                    </a>
                    <a class="box" href="<?= Url::to(['laporan/rekap_per_jenis_kelamin_pegawai']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                                <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                            </svg>
                        </div>
                        <span>Rekap Jenis Kelamin dan Pegawai</span>
                    </a>
                    <a class="box" href="<?= Url::to(['laporan/rekap_per_nama_unit_jenis_kelamin_total']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
                                <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                                <path d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.707 0l-1.5-1.5a.5.5 0 0 1 .707-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z" />
                            </svg>
                        </div>
                        <span>Rekap Nama Unit, Jenis Kelamin dan Total</span>
                    </a>
                    <a class="box" href="<?= Url::to(['laporan/rekap_per_nama_unit_pegawai']) ?>">
                        <div class="box-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-folder2-open" viewBox="0 0 16 16">
                                <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z" />
                            </svg>
                        </div>
                        <span>Rekap Nama Unit, Jumlah Pegawai</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>