<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <style>
        body {
            margin: 0%;
            max-height: 100vh;
            height: 100vh;
            display: grid;
            grid-template-columns: 25% 25% 25% 25%;
            grid-template-rows: 20% 15% 15% 15% 15% 15% 5%;
            grid-template-areas:
                "top top top top"
                "nav nav nav nav"
                "div1 div2 div3 div4"
                "div1 div2 div3 div4 "
                "div1 div2 div3 div4"
                "div1 div2 div3 div4 "
                "div5 div5 div5 div5"
            ;
        }

        .top {
            grid-area: top;
            background-color: rgb(163, 57, 57)
        }

        .nav {
            grid-area: nav;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;

        }

        .title {
            font-family: "Arial Black", Arial, sans-serif;
            font-weight: 900;
            font-size: 40px;
            line-height: 1.2;
            color: #333333;
        }

        .div1 {
            grid-area: div1;
            padding: 20px;
        }

        .box {
            background-color: rgb(255, 255, 255);
            /* horizontal/ vertical offset/ blur radius/*/
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 10px;
            height: 100%;
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 25% 75%;
            grid-template-areas:
                "pic name"
                "txt txt"
            ;
        }

        .div2 {
            grid-area: div2;
            padding: 20px;
        }

        .div3 {
            grid-area: div3;
            padding: 20px;
        }

        .div4 {
            grid-area: div4;
            padding: 20px;
        }

        .div5 {
            grid-area: div5;
            background-color: rgba(49, 156, 0, 0)55)
        }

        .pic {
            grid-area: pic;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pics {

            width: 100%;
            /* Ensure the image fills the available width of the grid cell */
            height: 100%;
            /* Ensure the image fills the available height of the grid cell */
            object-fit: contain;

        }

        .name {
            grid-area: name;
            padding: 2px;
            font-size: 2.5vw;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-weight: 500;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .txt {
            grid-area: txt;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.5;
            color: #333333;
            padding: 20px;
        }


        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            background-color: #1877F2;
            color: #fff;
            transition: box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1877F2;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            width: 75%;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            background-color: #42B72A;
            color: #ffffff;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #359023;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        }

        a {
            text-decoration: none;
            margin: 20px;
            font-family: "Arial Black", Arial, sans-serif;
            font-weight: 600;
            font-size: 40px;
            line-height: 1.2;
            color: #333333;
        }
    </style>

</head>

<body>

    <div class="top"> <a href="{{ route('root') }}" class="btn btn-secondary">back</a> <br> <br>
        <div class="title">Capstone Corner</div>
    </div>
    <div class="nav">
        <div class="title">About us</div>
    </div>
    <div class="div1">
        <div class="box">

            <div class="pic"><img class="pics"
                    src="https://scontent.fcrk2-2.fna.fbcdn.net/v/t39.30808-6/345049655_3001798390115082_388009993369835840_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeGVFlvESYlO-Cb_jA4E2IHFWMaXVHegksBYxpdUd6CSwBA0S7YbmuEefIeWp9jlrGAbNkOTSmfMC1lsPj8OWNSs&_nc_ohc=q-_Hm1sxo2kAX-PmxuB&_nc_ht=scontent.fcrk2-2.fna&oh=00_AfDAMiuoZ0KnhYzqjWeJkh2N6Ci6Av9IDMvvWapfxK0LaA&oe=64BD47E9"
                    alt="picture nang pogi"></div>
            <div class="name">Alfred D. Paris</div>
            <div class="txt">Main developer of this project. Responsibile for developing the whole stack of this
                website </div>
        </div>
    </div>
    <div class="div2">
        <div class="box">
            <div class="pic"><img class="pics"
                    src="data:image/jpeg;base64,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"
                    alt=""></div>
            <div class="name">Rea Santos</div>
            <div class="txt"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus sed, aperiam
                commodi ipsum vero recusandae voluptatem, hic, pariatur aliquid rerum similique ratione debitis numquam
                molestias suscipit tenetur doloremque aspernatur. Autem.</div>
        </div>
    </div>
    <div class="div3">
        <div class="box">
            <div class="pic"><img class="pics"
                    src="https://scontent.fcrk2-2.fna.fbcdn.net/v/t39.30808-6/253805637_401705055028149_2316147403542981105_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=174925&_nc_eui2=AeEeOaP0wWDI-vZLQAYrqxhOK2Z3hwfrJ9wrZneHB-sn3LhfWWFKOCv3heh89nirMON0VzDS2V_Qi0Vn9cMICGY5&_nc_ohc=q2beKVFW2u8AX_3lX2F&_nc_ht=scontent.fcrk2-2.fna&oh=00_AfCyIqzDAeGL8kK20a-bc476wLcSX_4oQIH-L-4uaOyRTg&oe=64BD16DB"
                    alt=""></div>
            <div class="name">Jayson Sanchez </div>
            <div class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo assumenda reiciendis, sed
                sint eius omnis iusto, labore cumque itaque soluta quasi autem impedit tempora deserunt consectetur
                consequatur inventore explicabo dolorum! </div>
        </div>
    </div>
    <div class="div4">
        <div class="box">
            <div class="pic"><img class="pics"
                    src="https://scontent.fmnl9-4.fna.fbcdn.net/v/t39.30808-6/272787736_1575116106201154_484531836035116220_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeHi5zqv_7SfKbRW0iwmtaDK4sbrMl-_wO_ixusyX7_A7zl85yuZvLCijRUdTrmgCKDfYlD8BkYLfr2bFFoYz8tT&_nc_ohc=txVDLS6FAG4AX-b1Wto&_nc_ht=scontent.fmnl9-4.fna&oh=00_AfCzY55ekaTNZlukjRvfNfT8867Jh1Ok7Z4jQ69Xg4xiIA&oe=64BCCF75"
                    alt=""></div>
            <div class="name">Diosdado Devera </div>
            <div class="txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, nesciunt eligendi
                recusandae atque ad ex rerum nobis ipsum adipisci, ab et dolor placeat iure corrupti distinctio, fugiat
                provident dolorum. Dolores. </div>
        </div>
    </div>
    <div class="div5"></div>
</body>

</html>
