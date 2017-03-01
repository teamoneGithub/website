<?php
        header('Access-Control-Allow_Origin: *');
        error_reporting(E_ALL & E_NOTICE);
        session_start();
        $connection = include_once("connection.php");

        if(mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: ". mysqli_connect_error();
        }

        $images = array("001-4mLFUnC.jpg", "002-1IZaO8t.jpg", "003-6vikFGE.jpg", "004-EwZnEBS.jpg",
            "005-4cFfT63.jpg", "006-YYIgtui.jpg", "007-iIH9RCp.jpg", "008-yDqwKlw.jpg", "0(09-od3TEHy.jpg", "010-gf9ohHF.jpg",
            "011-nGqhGry.jpg", "012-ge1tzzO.jpg", "013-SJHcP6e.jpg", "014-aYqeshT.jpg", "015-FHYgyo1.jpg", "016-8NwkNop.jpg",
            "017-pzG86P9.jpg", "018-C9enFPZ.jpg", "019-EAWmIrR.jpg", "020-rm6rKM0.jpg", "021-L4vaU4C.jpg", "022-Cy0yWBX.jpg",
            "023-sz32Fxp.jpg", "024-OH4SRsw.jpg", "025-iOLNEcF.jpg", "026-xYiXpRh.jpg", "027-dhaxuig.jpg", "028-mSX3lq9.jpg",
            "029-1LWNhks.jpg", "030-YvUKwXS.jpg", "031-c9qh8bc.jpg", "032-5vs8Awg.jpg", "033-WfXB73Q.jpg", "034-wfEwgHK.jpg",
            "035-HY1E8RZ.jpg", "036-nCNRVP1.jpg", "037-6m6e3TL.jpg", "038-Rw7CVIc.jpg", "039-qQjNz3p.jpg", "040-Nm1Plj5.jpg",
            "041-EQkvvgX.jpg", "042-SYoNj7E.jpg", "043-u2xJvVX.jpg", "044-B9DIgQQ.jpg", "045-nO15v2B.jpg", "046-tBBuPBy.jpg",
            "047-FS0V0Ye.jpg", "048-zZOMcr4.jpg", "049-nNQapN5.jpg", "050-Ydfctu8.jpg", "051-8JOjVUs.jpg", "052-GEaZH0O.jpg",
            "053-xqrM1Yw.jpg", "054-KyONBvE.jpg", "055-rTv5p1D.jpg", "056-3C1vBSH.jpg", "057-KydPPhh.jpg", "058-zG2flK8.jpg",
            "059-vjXgrkh.jpg", "060-Di3oqu4.jpg", "061-JbSkMlo.jpg", "062-Lq1dfoa.jpg", "063-4mLFUnC.jpg", "064-1IZaO8t.jpg",
            "065-6vikFGE.jpg", "066-EwZnEBS.jpg", "067-4cFfT63.jpg", "068-YYIgtui.jpg", "069-iIH9RCp.jpg", "070-yDqwKlw.jpg",
            "071-od3TEHy.jpg", "072-gf9ohHF.jpg", "073-nGqhGry.jpg", "074-ge1tzzO.jpg", "075-SJHcP6e.jpg", "076-aYqeshT.jpg",
            "077-FHYgyo1.jpg", "078-8NwkNop.jpg", "079-pzG86P9.jpg", "080-C9enFPZ.jpg", "081-EAWmIrR.jpg", "082-rm6rKM0.jpg",
            "083-L4vaU4C.jpg", "084-Cy0yWBX.jpg", "085-sz32Fxp.jpg", "086-OH4SRsw.jpg", "087-iOLNEcF.jpg", "088-xYiXpRh.jpg",
            "089-dhaxuig.jpg", "090-mSX3lq9.jpg", "091-1LWNhks.jpg", "092-YvUKwXS.jpg", "093-c9qh8bc.jpg", "094-5vs8Awg.jpg",
            "095-WfXB73Q.jpg", "096-wfEwgHK.jpg", "097-HY1E8RZ.jpg", "098-nCNRVP1.jpg", "099-6m6e3TL.jpg", "100-Rw7CVIc.jpg",
            "101-qQjNz3p.jpg", "102-Nm1Plj5.jpg", "103-EQkvvgX.jpg", "104-SYoNj7E.jpg", "105-u2xJvVX.jpg", "106-B9DIgQQ.jpg",
            "107-nO15v2B.jpg", "108-tBBuPBy.jpg", "109-FS0V0Ye.jpg", "110-zZOMcr4.jpg", "111-nNQapN5.jpg", "112-Ydfctu8.jpg",
            "113-8JOjVUs.jpg", "114-GEaZH0O.jpg", "115-xqrM1Yw.jpg", "116-KyONBvE.jpg", "117-rTv5p1D.jpg", "118-3C1vBSH.jpg",
            "119-KydPPhh.jpg", "120-zG2flK8.jpg", "121-vjXgrkh.jpg", "122-Di3oqu4.jpg", "123-JbSkMlo.jpg", "124-Lq1dfoa.jpg");



        $event_locations = array("Sacramento, CA", "New York, New York",
            "San Francisco, CA", "Seattle, WA", "Portland, OR", "Reno, NV", "Las Vegas, NV", "Dallas, TX");
        $event_preferences=array("Music", "Food and Drink", "Sports", "Outdoor",
            "Health and Fitness", "Family and Friends", "Retail",
            "Performing Arts", "Entertainment");
    
        $eventName = "Event Name "
        //iterate through array to retrieve active preferences
        for($i=1; $i<=sizeOf(images); $i++){
          $locationRandom = rand(0, sizeOf($event_locations));
          $preferenceRandom - rand(1, 9);
                $sql = "INSERT IGNORE INTO events(event_id, event_name, event_location, preference_id, img_path)
                VALUES('$i','$eventName','$event_locations[$locationRandom]','$preferenceRandom', '$images[i]');";

                //Try inserting the preference into user_preference table
                if(mysqli_query($dbCon, $sql)){
                   echo "Events have been inserted successfully.\n";
                 }else{
                   echo "Insertion failed.\n";
                 }
            }


?> 

