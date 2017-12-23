<?php
  session_start();
  require 'SQLconnect.php';
  $link = openConnection();
function SignUp() {
    global $link;
    $email=$_POST["Email"];
	$query=$link->query("SELECT * FROM Profile WHERE Email = '$email'");
    if($query->num_rows > 0){
        //XXX Should immediately redirect to log in page with error message there
        //echo "Already another account with the same email exists.<br/>";
        //echo "Please log in. Redirecting after 5 seconds.<br/>";
        $_SESSION['error'] = "account_exist";
        header('Location: index.php');
    } else {
        echo "Redirecting ...<br/>";
        $fname = $_POST['Fname'];
        #echo $fname . "<br/>";
        $lname = $_POST['Lname'];
        #echo $lname . "<br/>";
        $nick = $_POST['Nick'];
        #echo $nick . "<br/>";
        $gender = $_POST['gender'];
        #echo $gender . "<br/>";
        $day = $_POST['day'];
        #echo $day . "<br/>";
        $month = $_POST['month'];
        #echo $month . "<br/>";
        $year = $_POST['year'];
        #echo $year . "<br/>";
        $date = $day . "/" . $month ."/" . $year;
        #echo $date . "<br/>";
        $hashed_password = password_hash($_POST['Pass'], PASSWORD_DEFAULT);
        #echo $hashed_password . "<br/>";
        #XXX missing checks that query is done
        if($gender == 0) {
          $new_account  = "INSERT INTO Profile ( FName, LName, Nick, Email, Pass, Gender, BirthDate, ProfilePic)
          VALUES ( '$fname', '$lname','$nick','$email','$hashed_password',
             '$gender', STR_TO_DATE('$date', '%d/%m/%Y'), 0x89504e470d0a1a0a0000000d494844520000017c0000017c08020000004385979d0000001974455874536f6674776172650041646f626520496d616765526561647971c9653c0000032069545874584d4c3a636f6d2e61646f62652e786d7000000000003c3f787061636b657420626567696e3d22efbbbf222069643d2257354d304d7043656869487a7265537a4e54637a6b633964223f3e203c783a786d706d65746120786d6c6e733a783d2261646f62653a6e733a6d6574612f2220783a786d70746b3d2241646f626520584d5020436f726520352e302d633036302036312e3133343737372c20323031302f30322f31322d31373a33323a30302020202020202020223e203c7264663a52444620786d6c6e733a7264663d22687474703a2f2f7777772e77332e6f72672f313939392f30322f32322d7264662d73796e7461782d6e7323223e203c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a786d703d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f2220786d6c6e733a786d704d4d3d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f6d6d2f2220786d6c6e733a73745265663d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f73547970652f5265736f75726365526566232220786d703a43726561746f72546f6f6c3d2241646f62652050686f746f73686f70204353352057696e646f77732220786d704d4d3a496e7374616e636549443d22786d702e6969643a43443835363938463544413131314533423845354144344138413545394631382220786d704d4d3a446f63756d656e7449443d22786d702e6469643a4344383536393930354441313131453342384535414434413841354539463138223e203c786d704d4d3a4465726976656446726f6d2073745265663a696e7374616e636549443d22786d702e6969643a4344383536393844354441313131453342384535414434413841354539463138222073745265663a646f63756d656e7449443d22786d702e6469643a4344383536393845354441313131453342384535414434413841354539463138222f3e203c2f7264663a4465736372697074696f6e3e203c2f7264663a5244463e203c2f783a786d706d6574613e203c3f787061636b657420656e643d2272223f3e3ec1726d0000170b4944415478daecddd977db4696c7f121408204c105dc17eda2b55876a773e6ff7fca431ef23873667a928c5759964871df092eea9298d8f2229b96480855fc7ec2a396bb6d9ff425f5c3bd05a0e0fbe5d7dffe0300dca2510200840e00420700081d00840e00103a00081d00840e00103a00081d00207400103a0040e800207400103a0040e80020740080d00140e80000a10380d00140e80000a10380d00100420700a10380d00100420700a10300840e00420700081d00840e00420700081d00840e00103a00081d00207400103a00081d00207400103a0040e80020740080d00140e80020740080d00140e80000a10380d00140e80000a10380d00100420700a10300840e00420700a103002be3a70410027ebf1114ff187effc78f84f83e14346effb6e1c8994c261f7e399d4e87a391f8a6df1f5c5d5d5146103aebdabe6a5a3261379a2d110a5fcd17cb0a0b2250c47f8adf6c9aa1bbfeaac170389bce9cf135f14bf1477ad3e9877cd1755dfc0de29bf957c771c69389f8fde24ff12e80d05997b8c966d2857cf6f73f5edc4e9c50302862281a8d8874308cc05d7f5c8446b7d7ebf6fabd5e7f341acdbb1880d0c11d71934e6d6c144423f3e78b57fdc140fc97226452c94422618bb9e9bb7f8373d3cf88df295ea984fd959667369b7f2f86a9d9d595f8cdce4dfb23128afa83d0592f11cb2aedef98a1eb29e9fca2d26cb6f2b96c36930a9be6e27f89e880bed1048989ecdb7f5c448f98adc484d51f0c27938908a9d1a70b4000a1a3029fcfb7592c140b39f18df865bbdd71c6cecfff7c1ef0bbfdce7e3595440c0dfae29f416ffe959e08848ed44423f3a4b4fba19db9baba0a85423bb1a877fe0d45f60562d1d8ad7f25113d623aebf5fbdd6eafd3edf126123a9086f8493e3a28e99a76bbebf9c67ce49da014af742a394f49913bed4ea7dde98a1e8df794d081772513f641696f3e52493d1bc6a211f112df4f6733913d8d56bb5e6f8c5909527b4de0975f7fa30a72c9a453fbbbdbb227ce37b4daed7aa345fa103af084682472727ca070e2903e8c57f090402070f8646f4d124788c762e2b5b7b3d568b6cecb15d67d081db8eda0b42772670dff8f27ecb878f5fa83f38b72addee03e2fa97197b93492097bbee6bab6acb0f9647ff73ffff9bc98cfe9bace47824e072b2446aaedad0dea309f31452936360a9797d5b3f3f2fc4e54d0e960c9e2b1682818a40e1fe89a96cf657ffee999e87ad667918bd0817be657d3e1cbe8115dcf4fcf9ec6bc741d36081d1544d77b35e7db4c337472747050da63a1470aace97854c0ef0f0683e1b0190a1ae29b45f6a65873a9642262597fbc78c96da5840e7e2068e2f15832618bafb76faac28244363f7f7af4e6f4eca25ca11a840eee2486825c266ddbf11833d483f97cbedded4d51ca3f5fbcfab0eb18081dfcddda0402c57c2e9b49b118b15ca2597c7a74f0fb9f2fd8458cd0c1c7ee66676b23934e71ba7745a211ebd9f1e1bffef8d371b890c75b58387804a964e2e79f9e6533691267a54c33f4ece9d17c1757103aebdae068daf141e9fa162a3f3da61b828671f2f490eb2a099d351508044e9e1ed9769c52b85a76bffff8e889f7f7542474b064e260fbfce4c80a9bdd5e8f0b49dc2ffef1e11356eb099d3512b1ac672747226bfee75fbf777bfdef3ece054b17364d913b1a573f113aebc034431bc5fcbffeefcf172f5f6f140bf96c869a3c8a68c4dadfdda60e848efa744dfffdcf1783e1f0f8e8891d8f519047944e25097d42477ddddef5d39d4a7b3bd108171c3fbe9ded4dd1f2500742477162bc626f0a8ff0f97c07a57d2e592074d45e4a886c6d14a983771846a0b4bf4b1d081d658faba5fd1deae035763c96cda4a803a1a3a0423ec7e5b0deb4b3b5c92e45848e6a027eff66314f1dbc49d7f5fd3dcea0133a6ac966d35c8de665f19818b2d2d481d051a5b2378f2ba00e1eb7592cb04923a1a38864c2e6bcacf7194660831198d05103171fcb82c57e4247053e9f8fd091e8cddadddea40e848edcc266c8cf6c25515bcaaef8848eecd8bc423a9b5c354ee848cd0c99b3d9ecfc82a72f4943743a3c9b98d091583068fcffcbd76c5527176e91237424566f349bad762a69530a894423162b3b848eac44e2885e9d4e473a857c8e22103a529a4c26e964823a48c78ec74c93e764113a12e23a1d79dfb80237af103a32e23a1d79a55349de3b42473e6c872cf18f84a6b1b72ca12361e8701244666c2a48e8c82762f1bc01a9a763937790d09189aeebc120fb60cadeecb0b917a123d5719222c82e9988b3eb23a1230dd3647316e9f9fd7e6ec52274a4610498ad54c0e59d848e3ca1c3834d9460c7634c58848e2c9d0e9796316181d07133743875a58a04f7b2103a5208040214419109cb8e530442c7f305d5349e3ca38ca061700104a1e3fd8500f6d0514a3cceb20ea1e36dba46e828857b77091dcf1754a7a46a850ef7ee123a5e2fa88f922a25e0f7b39720a1e3693e1f35506fc2e28e7342c7d3e3156b3aaab1c23c3a91d0015c140e73d69cd0015c0d9db08fb199d0015ca36b9a61709539a1e355b3e99422a82718648f2442c7abaeaea8818242840ea103b889f18ad0f1ae29e39592a1c3ce01848e67cd66338aa01e9ef949e8783874ae081d157f4e38654ee87877bc9a305e01848e9ba1339b316129f873c20eed848e978d27138aa0dad4cc8184d0f174e88cc71441b5d0e1fa2b42c7cb1c87d0a1d301a143a78307850e9d0ea1e361a3914311940b1d4e4a123a1ed61f0e29826add2b2707081d2f1b0c0614819119848e7b1c677cc5c90eb54cb8e693d0f1329138c3e1883ad0e980d0714fafdfa7082a19399c1c2074081db8d8ba8ec72c24133a5e0f1dd692956a7358a423743c1f3a3d3a1d75b04247e848603a9d0e477c5215e1b0a043e848a1dbed510435f41996091d4207ae860e9798133a52e874bb14410d8301a143e84871781c0ca7ec8720bff164c29581848e1caeaeaeba343b0a1c3cb8e48ad09148ab4de8488fab1f081d99743a848ef4ba840ea123d5e7b537611f16f9df448a40e848e36659878facc4468ec38ed7848e641aad3645604006a1c3a7168bbd7d34aa848e74fa8301fdb9bcdaed0e45207424fce076f8e04a69e438036e80207464d4645947d237aed9a208848eaca1c31650326a103aabe1a704ab6386429a7e1debc3e1c83443144422e238914cd8c5425ed7b4f16432180c6bf506d7ec2c85ef975f7fa30acb6585cd4c269d4925755da71a2a79f9fa6de5b24a1de874bc251ab14e8e0f7d3e1fa550cfdece56a7d36575f98158d3596adfe8f3edefed90380abfbfb95c863a103a1e12b12c33c4da8dca32e9145333a1e3a5d089842982da744d8bc7a2d481d0f10a2b4ce8a82f6c9a1481d0f10a2310a008eaffcc68acd9113a9e112074d6c0983d92081d0f5553a79eea1bf0c04f42c74b8d37f554dc743ae5d67342c74bd5e40a1dd5d51bcd194f16227400d7546b0d8a40e8002e994c26ec8e44e8006ece562d76292174bc76249c52049543a7d9a408848eb78c1c8722a86a369b71de8ad0f11c1e5eae3091389cb722743c8787972b3d5bb17b29a1e33d9d6e773a655947d1230a1bec133ade1cfbabb53a7550cfc87158b023743caa52ad510415db1c9690091dafeaf5fae2451d14c33581840ecd0edced7438594ee87859b55a63cb15950c47a3f19807d2133a1e369dcdce2f2ad441a5919922103a5e572e5726343baae0c19e848e1ccdce45f9923aa8a1dfe7e97a848e0cce2fca8ec342800a06c301452074e468769a2d2e9c979e18933978103ad2188eb88655813687d98ad091c768c46303a4d7ef335b113a7c5ee1a21e6f22a1235767ce8973d975d82389d0914b97ebca64e638e3c180351d42472aed0ec749a9df3e6eb9227464d364bb39a9df3e36ee2274a4d31f0cd8fc4952b3d9acc13183d09151adce3321e59cadda1d369f2574e40c1d3630955395a305a123a99e18b1b8aa5536a2c7a93778b41ea123ef31936647bea1b8c953ae081d89552e6b3c035b2ee50adbb0113a321b8fc79c079148bbd3e5ee0742477a17658e9cd2787f7e4111081d150e9eec7a2985c160c83581848e32c7cf324590e06dbae06d227454516f345929f038c71973aa91d051cadbd3338ae0e937e8dd19e719091da5b4da6d6e01f5ac4eb74b9b43e828e8d59b5376f6f220d1e0bc7e734a1d081d058d1ce7e5ebb7d4e1513b9ade97b7fe9f5f945971237494556f345fbe7e73fb2a7bc719f38977cd65b5fa5ffffdbf6f4fcfe6f7c4891ee7fca2727a764e65dce1a7048fa272596bb6daa964c20c85babd5eadd6d8d828586193cab8a0dbed4f67b3f71765f1d2348d7bac089d7521ba1b7180fdf0cbe190e7d5b841c4cded9bfe491cc6abf535e42159aee874ba9c142774708da70eb883adf2091dfc657c833aacbed3e1010f840efed61f70026bb5a6b3194f222374f051b7cbcfc38adb9c7687051d4207b77e247882ed8ab5bbec2e42e8e076e8706265c55a6d36ca217470cbcd8a0387e255994c267d2efb2674f099469343f1ca662b1a4942075f62e38bd5e13956840ebee2fad9e7239e7dbe7ca2c761e76342075f7759ad5184a5ebf67a6c6344e8e08ed0a9113acbc76219a1833b89f1aadde652fd65870e0b3a840ebed9ecb053ef32f5fa83dbdb5980d0c1e7eaf5060b104b5423c4091d7cdb7436bba85c5287a5b8babaaad51bd481d0c17794cb975336b55b866eef2bdbb083d0c1e7c69349a552a50e0f775965b62274b098f3729966e7e1832ab315a1834539cef8ecfd057578886ab5369d4ea903a183455d942b227aa8c3bd951951091dfc90d96cf6f6dd1975b89f4eb7cb0eb0840e7e7c40a8d5d951f0be7d22971d103ab897d76f4ed908e6478d1c87bd2c081ddc53af3fa85cb236f163cede9f93d4840eeeeff4ec9c1b2316371c8db83c87d0c18388c4797f5ea60e0b7a77469b43e8e0c1b8f57c4183e1900b02091d2c010f1d5e50b556a7cd217400f74ca7dc3b42e86019748d376bc1d0e1be074207cbe02374081d4207743a1e34634187d0c1723a1d9f8f222c143aec0742e860396f159dce62ae66743a840e96325ee93a4558046b3a840e96143a7e4207840e5ce4a7d301a10357df2ad67440e8804ec783387b45e860395848a6252474e072e8f06681d0819be395df4f1140e880f18a4281d051b6d3e167893994d00107700f7ea659482674b09c4e47674d6721866150044207cbe87418af160c9d00e94ce8e0c17c3e1ffbe9d0e9103a7073b6a2cd599465852902a183870d56babeb559a40e0b3243a15834421dbc7b04a5041e974a2676b737038100a558dcc9f161bbdd393d7bdfe9f6a806a183458582c1bdddad782c4629ee21168b3e8b1db5daedd377e7dd1ed143e8e09b7c3edf46215f2ce4b8e4e4814464c74f62cd66ebcde9d96038a420840ebe7e88dedbd93243214ab12cb62dc227faeeecfcbc5ce1e19f840e3e127dcdf666319fcb528a95d4766b2399b45fbc7c43cbf3c88dfc2fbffe4615bc206259a5fd1d1a9c55139dcebbf7e7efcfcbb43c743a6b1cfc3edf66b1502ce478b2953bd5deda28c6a3d13f5ebc9a4c2614e411ba4e4af0b84c33f48f67c71bc53c89e3a6582cfafce428140c520a4267bd2413f6f393e3b069520af789c47946ee103a6ba558c81f3ed9e78eaa4714f0fb9f1e1f1806175e123aeb9138dbdcd9e00141c3787a7810602b5842476d093b4ee2788769868e0e4bb49c848eca87d6d2de0e75f09488651d1d94b8fe9bd05190dfef3f3c28f15c070f8ac5a227c707dc584be8a8d6c63f3b3eb4c29cabf26ebff3fce4883788d05181cfe72be4b3ff383916b943353c3efc3e3f39dedc28306aadb0dfa704ab66c7633b5b9bc48d444788cd6221954cbc7a73da6e772808a12359dc6c140bd1884529e49b8543a193a3836aadfefaed3bee962074243854261376319f63b35ed9a545c363c72fabb58bf2e57034a220848ee704fcfe6c369dcf663809a20c5dd7f3b9ac78355bed8b72457ca526848e2788192a97cd88e322f76d2a3c2c8b97e87744d7237a9fe9744a4dee390ab09fce43689a964e2572d92ce759d7ca7436abd71b227ada9d2ed5a0d37149d03072b94c369de24abf759cb9342d934e89d768e45cd66a227dc43794854e6735f5f2f912765c648d6dc7a9063e102d8f889e7aa3c9d845e82c4d346289235b2a99d079d826ee30136357a37959adb7daac37335e3d608c9a37d2c1204fc8c677dcacf125c5cb71c6a2f111ad0f9bc0d3e92c3cb4eb7a2a698bce8607d4e2213addde7cece20a4342e74eb61d4f2713c984cddd375896ababab46b355a9d69acd16d560bcfa4bd834d3e9642695e4ba3e2cffd87e7391ba788dc7e3cb5abd5aadf707033a9d352522269d4a88318a0b6de0a65eaf2fc62e31778dd76fec5ad34e47d77571d8b9b9b126c60f00dc675961f1dad9de6cb6da95cbaaf8ba3e0fff5bafd0115dae48994c3a25beb264032f7c20c5714fbc44bf53bbb9c4597440848e22e2b198e86b52499bab6ce0c531dfefcf6733e2d51f0c6eceb537c6e3b1b251abf69a8ee86045d6b03c0ce9346fce76359a2df5c62e353b9d5030787d8d563ac9f31b2129db8e8bd76432b9b9c4b9d6e9f6081d4ff6a837a7a2446b13b1d8ac0f4afc7cfafdd94c5abc06c3e165b55eadd51c47fab14b85f18a5351581fad765ba48f687f66b3199d8eeb79f9f7a92811366c9d8535118fc5c46b3a9dcec72e1937f4913274a2112b954aa69309f6b2c17a12ddfdc70d7daab5cb9a4c1bfac8345e1946209b4ea7520933c4e35c804ffcb5a14fbd31f5fcd82541e870c337b02091380dcf6fe8e3e9f144ccaeb96c9aab8781458fd0b736f4a954abb55ac3831bfa78b1d3b91ea332693149896ff818010f31dfd0a726c62ecfeca3eaa1d099df87225a1bd1e0f059019668369b5ddf59ea8d0d7d3c315e854d339b49899e90b351c02a689af671439f9b7bbb1e71439fc7ec74c4fc994a257399348fdf055c36dfd0a75a6fb8bf8feae37416a160309fcb64d229eef9061ec5236ee8e376e8d8f1583e97e57e05c00b6e6fe853add6abf5ba0b1bfab8345ecd2fa014dd0db77d035ef6d7863ed5faeaf6515d79e8844d53644d2a95d4b9d606908418b5e66357630567bb56385e898971a3904f266cde4240d2b16b301cbe3f2f576bf525aef8aca4d38946ac8d6281851b400d23c7397b7f5eb9ac79b1d3114123e246840eef13a08ca061ecefeee43299576f4ebbbd87ee61b8b44e478c516298e28a1b406d97d5dadb77ef1fb26ffc123a1d2b6cee6c6f710b38b00ee6dbe6bd78f5e6de6bcc0f0a1dbfdfbfb551c86533bc13c0fa103ff84707a58b72e5cde9d93d1698ef1f3a763c56dadf0d70b714b096f2b96c3412f9e3c5cb1fddb4f03ed7ce689ab6bbbd797cf884c401d69965857f7a7ef2a3db42fc70e8040de3d9d3231172541c80ae69c787a5841d5f55e8844df3f9c9911536a93580399fcf77f8643f9d4a2ef8fb7f603eb2e3b18327fbdccd00e0cbdc29eded88af97d5ef5f40b8688288c4393a28913800be913b8b9ccb5e2844a29188689f78a01d806fdbdddefceefacef743c7b2c2c787259ec70060917ee749692f6c9af70f9d80df2f7a1cf6f703b0205dd3ae9762ee0e0ded7ba1b51b340cea086071c1a0b1b7b3759fd0d92c16781a0c807b48a79277eda57567e8442cab58c8513b00f7b3bfbbfdd5874a69770d56f3b3ee140ec0fdcc6f085f3474368a79d30c5135000f91cda4bf3c93f595d0318c4021cf6005e0a1c4b4b4f945b3f395d0d92c16b9f218c0522413f66763d3e7e1227aa14c3a49a5002c4bf1d3c9e9f3d0291672ac1f0358a2543271fb34d627a113340cf13f5323004ba4695afa56b07c123ab95c863607c0d2a56f2dda68b7d3289b4e511d004b17b1ac5030f879e824ecb89f3d8f01acb8d9f9183ad90c6d0e8055c9a4529f848e610462d1287501b022c1a031bf3a59fb7bb6b2594206b052f6cda6827f874e9c2d2c00ac563a95f82b74344d8bc598ad00ac9618af8286711d3a2271d80219800be2f1d875d6c4594206e08a583472133a714207802b9d8e98ab745d3743ecd705c00d8140408b581627cb01b8468b44c25401808ba163595401807ba1f3ed078002c09243c730025401807ba1c32a32005743871200207400103a0040e80020740080d00140e80020740080d00140e80000a103400eff1660003ecacf2633b758580000000049454e44ae426082 );";
        }
        else {
          $new_account  = "INSERT INTO Profile ( FName, LName, Nick, Email, Pass, Gender, BirthDate, ProfilePic)
          VALUES ( '$fname', '$lname','$nick','$email','$hashed_password','$gender', STR_TO_DATE('$date', '%d/%m/%Y'),0x89504e470d0a1a0a0000000d494844520000017c0000017c08020000004385979d0000001974455874536f6674776172650041646f626520496d616765526561647971c9653c0000032069545874584d4c3a636f6d2e61646f62652e786d7000000000003c3f787061636b657420626567696e3d22efbbbf222069643d2257354d304d7043656869487a7265537a4e54637a6b633964223f3e203c783a786d706d65746120786d6c6e733a783d2261646f62653a6e733a6d6574612f2220783a786d70746b3d2241646f626520584d5020436f726520352e302d633036302036312e3133343737372c20323031302f30322f31322d31373a33323a30302020202020202020223e203c7264663a52444620786d6c6e733a7264663d22687474703a2f2f7777772e77332e6f72672f313939392f30322f32322d7264662d73796e7461782d6e7323223e203c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a786d703d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f2220786d6c6e733a786d704d4d3d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f6d6d2f2220786d6c6e733a73745265663d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f73547970652f5265736f75726365526566232220786d703a43726561746f72546f6f6c3d2241646f62652050686f746f73686f70204353352057696e646f77732220786d704d4d3a496e7374616e636549443d22786d702e6969643a44384439304441343544413131314533414434384131353834434646454346352220786d704d4d3a446f63756d656e7449443d22786d702e6469643a4438443930444135354441313131453341443438413135383443464645434635223e203c786d704d4d3a4465726976656446726f6d2073745265663a696e7374616e636549443d22786d702e6969643a4438443930444132354441313131453341443438413135383443464645434635222073745265663a646f63756d656e7449443d22786d702e6469643a4438443930444133354441313131453341443438413135383443464645434635222f3e203c2f7264663a4465736372697074696f6e3e203c2f7264663a5244463e203c2f783a786d706d6574613e203c3f787061636b657420656e643d2272223f3e1a3b7fc400001e604944415478daecdd595fdb58baeff1588325d996e5790603214955f53ee7fd5ff7455ff40b387befdebdab92102683e7793e8f4d06070818b08d2dfdbeedce8782a4bab32cfff53cd2d25abebfffe39f6f00605314860000a10380d00100420700a10300840e00420700a10300840e00420700081d00840e00103a00081d00840e00103a00081d00207400103a0040e800207400103a0040e80020740080d00140e80020740080d00140e80000a10380d00100420700a10380d00100420700a10300840e00420700081d00840e00420700081d00840e00103a00081d00207400103a00081d00207400103a0040e800207400103a0040e80020740080d00140e80000a10380d00140e80000a103c01d34860042d775c3af9ba619b02cc3f09b8621df513555f1f92693c9585ea3717f30e8f57a8d66abddeec8d70c1a9ec7f7f77ffc9351f06895eb9bd1744d55255c66ff34fff6742a87857c5f552dcb0c0583a160c0eff72ffec1d168dc6ab7ca955ab5561f8d468c24081d3c92359aa64921a3fb755dd3245f66a1334fa0d92fcaace39e4ea66232ff8ffc26c7095ba6f92d957e907ae7b27475797925a510030b42075ff9fdd23a1952b6dcf44df2c5ac75526656f2ef6f773a9f3e9f369a4d861a848e87df579f4fc2c5b185744801a969eed629abd56cb5daedae94475237c9ffd674562e4d46e3f168381a0c87fdbefc3294ff4e67dd1b3c8d0bc96e2319138b3ad2100503814dfeefdaa190bc1ef80de3f1b8d79f5d8a96709280ea747bf21dde2f2a1dec2ae99862d148221e93ca6627fe0f4bed23c551b5566f345b5204f10e52e9606718863f954c241371e9a176ebffb661c4242547a39124cf75a55aaf3768bea874b0dd670c4dcba653a95442d7dc70f2908eebeaba7c5dae701b9ed0c13692ea269fcd48bde0b2bfd76030b8bcba2e5d95e9b9081d6c8b40c0da2fe4234ed8c57fc7c160787e7129e933610610a183d795cba60bb9ecaaa6d86c7bc3d5ee9c9c9ed5ea0dde774207afc0348dc3fd3dc7d505cebd4a57d727a7e7745baec1ddabdd108b460e8b7bfa4edd9f5a955432e184ed8f9fbf546b758e041760698b1d50c867df1f1f7933716e18862123b097cfad7b5e35a8743cfff668ead14151ca1c8642e2269fcb0483813f3f7e1a0c68b5a874b006a661fcf6fe98c4591471c2bf7f78b7e1273c40e878829cd2e5d3150a06198a5b2cd3fcfdc371c47b17d4091dac9113b6a5c671dfc4bfd5759ddafbe3a3782cca50ece4dbc7106c9b68c4393e3a505595a178e86ca928324a3e9fefba5c6134081d3c5f2c1a91cf9247e6febd9024cedbc3a27c41eed05e81c4d95cee1c1dec4b6dc850103a78b288e39038cfeeb31e5e3f0c840e6e0bdbf6bbb724ce33a9aafaeeeda169180c05a183a5040301f9cc70e5f825fc7e5dc650630c091d3cca30fcf3471cb8a2ffe2ec0e060e8a7b8c03a18387cce69bbc3d623eceaa24e2b16c26c538103ab8dfcd1d5f393f33142bb497cfedcad2f4840e36adb897e75eefea0f6845393cd8e70219a183dbd2a964264d23b01601cb2ae4b38c03a1831fc2b65ddc2f300eeb93492599b943e8e02bbfdffff6a8a8b018d53af97c3e897556fc2274f075dabee1e776d5da8582817432c138103a5e57c86559086663f2b90c13a0081d4f8b461cf918300e1ba3eb7a369d661c081d8ff2fbf5c3e23ee3b061e95482b997848e4749e248ee300e1ba6aa6a2e43b143e8784f269d621ee06b49c463060fa0133a9e12b0acfd428e7178c56227934e320e848e57f87cbe83e21e0be5bcae643ce6e5ad0a091d6fc966d2619ba9b1af4cd3b45422ce38103a1e68ac0256817be4db21958c536f123a1e68acf60a1ce85bc2308c18d7f2091db79f5a13e1b0cd386cd53bc220103aee3daffafd7bacaeb0656c3bc426e8848e6bed15729ac6533f5bd7f0261331c681d07121c70927e21cdcdb28168db2a820a1e3c2d3e97e9ea9805bcaefd779ca9fd0719b5432c15aebdb8c2294d071155dd79898b3e5c2768845d4081df7c8a6d34cb7df72aaaa4698b043e8b8836599e914334176403c1a6110089ddd1f4745797b58e4cec84e08d921cb3419074267b7ed1772a1201b4beec841eff3d161113abb2d1a71d8396fb7f01c16a1b3c3745d3f28ee310ebb25180cd061113abbaab85fe016ecee1df78ac22c41426727c563d1442cca38ec64531ca5c3227476b0b12aeee519879dedb0822cd84ee8ec98fd42ce4f63b5b354457158f088d0d92111279c64d9dd5defb0b88745e8eccca8294a71afc038ec3a3b14e4b115426737e43269cbe286ebced3344d7287712074b69dc44d2ecb4eb56e6993e9b0089dedb75fc8b3c7836b3876887793d0d96ad188c3d54737310c83d5da099d2d1e2c45d9632952f775584c4d2674b6562a110f042cc6c165d89e8cd0d952baa6e5b22c45ea42b3673f999a4ce86ca14c3ae5f733a7c39d5d73381c621c089ded6218fe4c3ac938b89513e6b20ea1b365b299344b91ba986d8734de5f42677b98a6c16356eee6d7f5205393099ded91933287f9636e17e11e16a1b32d658e61b027a41784c3b6cfe7631c089dd79749279926ef0501cb923e9a7120745ebbd5f7fb1371aee6788294398e4d8745e8bcb6742aa169dcd4f00a87e721089dd7a5eb7a2ac936c11e325bd34bd3180742e7d524e2310e414fd1342dc48d7342e7d5c64551d29439dec313e784ceab89451cee657850d8e6c639a1f34ab89ae34d9665b2a617a1f30a42c1806df3d8b147b11916a1f30a92890435b6774387cb3a84ce86e99a1663976b0f0b060386c1c6ad84ce0645a30e1bb07999aa2861a626133a9bc4730f60c30f4267730296c5968fb04321e685123a1b128b45b8840c5d676a32a1b3111237b1688471c0ecf4c39140e86c40281890f68a71c09bf99a5eac8a4de8ac5d34c2c90d5f197e3f1d16a1b3f6de8a7b16f8a9c3e2782074d64a5a2b9ef0c422c709b3522da1b3d6238cc78bf113d330983f41e8ac51c4a196c69d0e8b7b5884ceface69c100f7ad70cfa9880e8bd0598b5028c8b185bb0cc31f66911342673d27345633c0fde2b1288340e8ac7a08142514e47a217ed961f11c16a1b362a669b07e0a7e45d73596f52274564cca1c6e96e3016c664fe8ac187331f0b0b01db24c9371207456436a9c00abffe3e10f89a2c4624cd8217456d6b1eb164f3fe0d10e2b1653e8c1099d950858163374f028cb32c36c4d43e8ac267402f4ea58aed8e17232a1b39a33181708b19c68c4f1fbd92684d059457bc5418065a8aacaec6442e7a5344df3fb9916886525e371a674113a2f22d5b2aab10e2e96ae8b0316cf7f123a2f0c1d3ff741f124a964824120749ecfa0b7c21345220e4fea113acf170a3217194fa32a4a22c6bd7342e7597c3e5f90d0c1d32512312694123acf619a8669f000049ecc324d567d23749ed95b71bec2f3a412710681d079323bc4bd4f3c53d8095b1673d9099da798af68c15c643cf763e3f3252976089d27d1358d0b3a7889442caaa9cc2c257496e6f74becb0da365e7208f9a36cc547e83ce988e1bdc70ba592745884ced2988b8c97b3438205b6099da5db2bde7baca0d8e17232a1b3245d2774b002b168846389d0590a5791b1aa0329c1ca5e84cea37c3e9fc6323a5891649295bd089d254247658605562460596c1441e83cf67756081dac529a95bd089dc72b1d1ef5c4ea449c3013dc099d07ffce3e85e7cbb1d2da5949325190d079e8efac923858b15422ce2d5142e7975445e57603564bd7759e8a2074a874b05199748a6287d0f955a543e860f5fcba9e4927190742e7bebf33a18335153ba924cf12133af7e0820ed644daab7c2ecb38103a840e36279988b1f530a1036cf49456dc2b706223747e32994c78e3b13ec160209fcd300e840ea183cdc9e532368b0a123adf8dc763de78acf773e5f31d1d1699b643e87c352274b07e96691e1dec737187d09987ce684487850d884523c5bd3ce340e8487b35198d2876b046d3b937f367230a7966ee783e74a4cc190e87bcf7581fdfdccdd7855c76bf40bde3edd09153507f30e0bdc7c6e4b2e9b787459ebff16ee8887e9fd0c1da0beac54b87c944fcb7f7c7966932321e0d9d4eb7cb7b8ff57eb4144542a7d3e97e8f9eb01dfadb1f1fd229af3f894ee8006b69e14fcfcedbed8ea22a956a4d5e93f9756571b05ff8dbef1f224e98d0f15c7b3518dc732db9566f4cbf1d1cc0b3f97cbe66abfd9ffffaf7a7cf5f744d1b8d467ffef5e9ba5c198fc7f2fd7ebf9fcba40f8b7bb61df2e0851e8fce989483a0dbebddddd15cce488ae20bdb6c638497324de34dfd4db5569757221e937c91d0393bbf4c25e3f2a372a5daee7627e38907670f7af7727aabd5befb4d69bfe5b0e0038397d3b51fa734899b939353cb341d277c727afee7c7cf9aae25e3b15930d15e7947bdd9bcfb4dbfdf2f1d56f3be3c029ee4d6868ea3f1f8fcb2d46cb5f2b98c1c66a767179fbf9cc9f7a5088a38615df750cfe1ddd0e9743a833b53048d79c3757959e23383977eb414dfbdf5f5d9d9851d0a2513f1f1782cedfc65e9aad7eb9b86190c581ed978d6bba1331a8d9bcdd6dd4ae70d8b2863157e75b16656f25c5c4ae264d3a99b3d027afdbe5440dd5e7f711e33a1e34e729eb9f59d9bcd614321969bc4da8f3d099a542aa9eb5f2ffd4c2693d168e4859ba79e0e9d7aa3391c8d7eae74747979f3f21e56ebd1f868b53b956a351e8b1a86b73690f074e8c889a556ab2f7e479aeab06d6b9aca67062f341e3fbe7c4abf3fb82e57e490f3d479ceeb172faeaecbb7be138b46f46f0bbef188165e724a5bf2b7952bd58065792777bc1e3acd56bbd5fee906b9e384d579e84879fcf9cb69afd7e7f38367188e965d3e653299546b75e9ec3dd267793d7424592e2eaf7eeab0144599df4190f2b8566f9c9e5ff0f9c133f407c3271d878d665353b5efd795091d37ab546bdd6eefdef38f1c0ad272b7db1d46094f3d990d9ede9bb73b1d39e7b9fe9222a1330b97f3cb7b1e7d9072474a9e9b268b51c2930c86c3e5dbab45bd7eff66dd4142c7e5aeaf2b9dce7d8b5dccdffb7aa329f50ea38427f456fdfeb3d7e176fd6c1d42675eec4ca727a7677702c7f77d26bbfc94b5dcb1bc4ea7c720103a8fb85982e0a7a15194efcfc2f4fb83b30bae286359ad568b4120741ef7e9e4cbe2e69f123a9afae3d9df8bcbabfb5b30e056e13c99b43adc7c207496d0ebf5bf9c9e2f7e6771c1013992b8a28c6574e548625a29a1b3a48bd25563619d9d68c459fc69adde2857aa8c121e566f3459f496d059961c2b1f3f7df9bed9793c16b5ac9ff60c39f97236662b743c1c3af5068340e83c41a7db3d3dfbda64298a726b6f46a99b99a38c074863d5623629a1f354a5abf2e0db16a0d261c5a2919f5ab0cb2b76b0c1afd4ea756a6142e7c9e4a0b9bafe311b707f2fbf38337d7645f9842bcab8dfdd95e140e82c59ec5c7f3f5f9986b197cffd7c36e38a32eed1edf6eeae810b4267b9ce7c3090dcf9fe8fe954f2d69dac932fcc51c66dd795ea84fb5684ceb39d5f9416d7613a28ee2d6eced7ebf7cf2fd8210b6f16fbee728567f4089d17180c878b1bef197e7f71aff0532a5d96ee5d1303de244d374bbe113a2f7551baba89959bb95ef15834118f2d9ed9ee3e260acfba2c5d310884ce0a0ae69b471fe48be17c67bee27ec1307eac655ba9d66acc04c37c6b87069790099d95a8d6eae54a555555c9977e7fa06bdad1c1fee21a4b52ec30e71d97a5128701a1b3329f4f4ec7e3713018fcf3e327f9c209db855ce6fb4fdbedcedd2d25e029bd5ebf5c617a0ea1b33afdc1e0f397b35030a028cabffefd979cd0f2b9ece21df4d3f30b26a17ad945e94a1a70c681d059a5d2d575b3d52eee15ea8dc6fffef549bef3f6b068995f9f0595b6ebd69612f0d439895297d0593da96efefaf4d9348d64227e5daefcf5e944d3b4e3b787df1f8fb828956eae34c37365cee515752ea1b3169dceece9f3bd7c569aaccbd2d5e72fa7c180757450bcf9e97038bae08ea9f70c6665ce35e340e8accb97b38bd1789c4e26e4ebb3f3cb93d3b3583452dcfbbaf6c565e99a62c76be6d3d62973089db536591f3fa792096dbeeff0e9d9c597d3f36c269d49a7decc770eb9bce2a4e721fd7ebfc4d51c4267dd9aad76b556cfce53665efb9c4bcf75b05f88c7a2f28fa5d2f5e2e35a70b7b38b125773089d4d9094b12cd3fc362ff9e4f45ca2e7dddbc370d81e0c872c79e111bd5eff9a3287d0d98cf164229d7c22f1e3212c69b2e4f5dbbbb701cb92b31f3353bd51e65c8e999b43e86cb0c96a0d07c36020f02377ce66f5ceef1f8e7df3a78d192277eb767bec344de86cda75a52a4dd6e2435867e797a7e717ef8e0fdb9d0ec58ecb5becf30ba6203f9bc6103cb3c91a8f5bedb66918ddde8f25752e2eaf46a371219795c8f131462e252715aedc51e9bc8e5eaf3f9e8c178b9d590554ae7cfc7c32e1a6867b49494b254be8bc9ac16078f7f8abd51bb7b627866b4879cb7e0f84ce36aa351a9c0c297340e86c4ebf3f60b95c179639f3a9a18c03a1b38de464b8788119ee707ec9242c42678b51e9b84ca7d3e56a0ea1b3d5863c84e52e17ac824ce86c391e0574937e7fc02ac884cef6e3ace81ea5eb6bce2284ceb65355667bbbc46834621564426707180b1b9f63a7952bd5c1803521099dad677edb2b02bbdd244fa72516842474b69fa669c160807170815abdd1ee7419074267db85ed90ae714dc70d2e4b943984ce2e4826e20c820b743add7a8325d9089dad170a06224e98717081d27599098184ce0e28e473b716d9c12e1a8d462cd645e8ec8054324199e30ee54a8ddd13099ded6fac82df37fcc4ae634220a1b3ed4cc378f7f640555586c2051acd56abdd661cd681dbbaab6159e6fbb747c6b71df840990342678dc261fbf8b0e8f7fb190a77180c87ac1048e86caf6c26bd97cf2a0a8daa7b542a35f6a42774b6513018d82fe49c30f7aa5c653a9d5e95e9ad089d2d6318fe4c3a954e262870dca7d5eeb4db1dc681d0d91601cb4a25e389784ce3d12a9762937242673b8649d322613b1e8f39619beac6c546a311abaf133aaf46d734bf5f0f8542617bf6d27516e572bf5abdc12c6442e7158a9a58d48945228140c0cfea7ff4562074d62a954ce4b26993397e9e34180c1a8d26e340e86c88a2284707fb89788ca1f06e43adebc964e2b274c550acf7b3c610dc787b5824713ccee7f31dec17e2b1284341e8ac5d2695e450c34deec8e9276c87180a42679d1da6aae6b269c601df1bed776f0f03018ba12074d6251cb67956138b745d7f7f7c64b18910a1b3aed0a196c61da661fcf6e138140a321484ceea51e6e05e86dffffbfbe354928d3d089dd5d7d2cc1bc0fd54553d3a281e1f1d189c9956c7eb9f379fcfa7f8485e3c24317be62e7c7e7159baba1e8dc70c08a1036ca21cdedfcba79289cbababeb7295e7b3089de79b4ea793e984e300cb304da3b857c865d2956aad5ca9b6da9dc9848387d079ba3105b387f5fb0361ff7c07733ae79bbbafead1d3a9a4bcbabd5eb55aaf351aed7687a388d07982d188c3c5bb14c5576f36afca955030108d38370b9848d64809d3e97687c3917c1db04cf9fe6200c94f47e3b1ae69d94c2a974d8f46a366ab5daf37e4574922ca9f87f9fefe8f7f7a7c08f60b7966247bbedee94bee341a4dbfae47247bc2b63e5f1972381c56eb8d5aad2eb122b9635966c0925fccd91d4f9f6f3a99f4e68592a48caaaaf27d9fe29b8c27923bdd6eafd59e05d068381a934184ce2de954e2b0b8cfa1004996eb7245d2477a2e297c62b3f4091bc6ec6679bbd32997abe54a5542e6cdfc56fa2c7b0c4332e8e637484dd413fdfe643a95c032fc33f2db248f86a3e16020af81fc9ee168c6e3a510a1337b0ce28f0feff8c8e1c6743aadd51b1797a5fa7c6d9d602010b6438e130e062c4dd3a4e7aacd6b1fe9a4167a34455a30c330662b31f9de48bc74e4f77debb3247d744df247bd69d0a6d33793e9641e3ed2a249464d091dcf9193d2fffd3f7fa8ac7c8c9f497553ba2a4bed73739178de4019b66d4b11349b2be8f3753a1de9a15aed4eafdb9b7ccb8e9b6b4037cb4e4aa648f8b45aed7b4b9b6f1944e8788fe2f3fdc71fbff15431ee351c0ecb95da55b9bcb82f8de485e44e607e81479b9730d23b497325d5cd70de417d3d9f19864494fc4ef9a9fc71f9a9072386d0b9dffbe32369e019073cd07349b755baba96deea6ed922ed95ae6b7eddaf69aaa4ca743a911aa73f188c47a3c9fcd6bb659a52fea89ad6eff7a532f2f8f6a184ce4c2e9bde2fe419073caadbed49c355ae547bfdfe2f3f5473d28e4954496bf6bdba916c0a4af698a67c53ea9efeafff0d848efb85edd01fbfbd671cb024498d6aad2ee923e5cf333a2669b8a42f936092e492a6cc6b3d179303bf9ebea47567672b2c49aa98443c26af4ea72b554fb95a95ec58fe8f4be7252ff99798863f140ccab1379bece399e821746686a3911c3d8e43e8e06902014b5ef95c464a9e59e1536f2cff18fa4d9325f58eae6b8669c83f8e86232f440fa1f355bdd9749c30e380675014251a71e4d5eff72bd5fafc59d0f6927f567aabc16028273e297c14559d3d61e1f6a98384ce578d668b41c00b198691cda4e425a153a9d6aad57ab7d75bbef0a1bdf2964ebbd3ebf7d9db132b110a06e595cf659bcd96143ed2760d588287d0b965329f886126091dac8caa2811272cafd168dc6836a5f691f4197a7b920ea1f3936ab5964e261807acfe63a6a9b168445ec3e150ce6d123ed2ce7b76f9414267b1a99edc2cddc450604d745dbfb9d72e8923b9334f9fe6fc4232a1e33d7628f4eeed2189838da54f3c1695d768346ab5dad57a43d2a7dbed79e1ef4ee8cc48dd7b7458d45495a1c0c63b2f2d1271e435994cda9dae848f143f9d4ed7c537b3780ce24d3e9b29e4b3d438d81efd7e7fb6fee9acfa69f75cf78896a72b1d39c91c16f7a4c4e528c75631e612f1d8cd52cd8d466b163f9dce70e8863b5fdead746c3b248913b0584607bb61381c4aeeccae3c37dbf2c5ee3e26eac54a473aa95c369dcf65155a2aec0e5dd7238e232f891be9b91acdd6acfd6ab6766edaa1e74227140c16f7f2b7f6390276ebac6999a6bcd2c9c468346eb5db123ef57aa3d3dd8d95093dd45e699a9a4da7b39994c272c870a39be6ab56ab6ff9d6a35e099d5834b297cf5996c9a109d7ebf5fad57abd5aab4bf3b585b58ffb43c70e85f2b94c84652be03ddd6e4fa2a752ad2dbfd406a1f322c18095cda4e3b1287370e071cd56ebba5cad566bdb70d5d99da1130c0432e9a4c40d976f80ef86a391e4ced5757971a74042e7a5c276289d4a46230e7103fccacd763ad276bdca151f97dc325755351675928978d8b639a4808739615b5eed4ee7b2747d5dae6cf856d7ce573a96652662b1443c6ab0e81ff074dd6eef5cb26783d1b3aba1a3ccd76493d246029b4e0a78a14ea77b7a7e51ae54099dfb4a1bd39c2d44128fca171c2bc00ad5eaf593d3f3c55ddbd76167aee9dc943689784c7ea5b401d621e238e170f8e2a22455cffa16f4d981d0995fb589c6629436c0facfeef3c7a1e5d4fef1e44ba3d1f4567ba5aaeafcaa4d2c6c73d506d8b4e9747a767ef1e5ec62e5b7d5b7b1d2b9b921158f47d9850a782d3e9f2f9fcb0683c13f3f7e1e0c06eeac74a49c71c2763211e7aa0db03dfafdfebffffcd46cad6c0bdcad081dd33466a54d2cca53e0c0161a8fc752efacea86fa6bb65752bf85ed50329988461c95d206d856aaaa1e1f1d689a7a59baded5d0996f78184d25e2a150907714d87e52221c16f7e5d78bcbab1d0b1dc3f027e3f164222e5ff04602bbe5607f6f3a9dbeb0ded95ce80402563a395b6e42ca1cde3c607773673c1a5fbfe0face264227140c66d2c95834c23d29c0057dd6d16171341ed7ea8d6d0c1dd6ee03dc47aa87e3a3c3fffcefff69779ef394d6ba42276049dca458bb0f70254d53df1d1ffebffffad760f0e4f54f571f3a7ebf2ed54d3a99206e0017330de3f8e8e0bffef5bf4f5d886795a1233d94644d2e9b91dce12d015c2f6cdbc5bdfc5f9f4e5e2774ec50687f2f27bff24e00de914e25db9d6ee9ea0937d157103aaaaae6b36969a9b85a0c7890143b6dd1e92ef9fb5f7ad925180cfcfee19db454240ee04d52761c1d1497bf86fba2d04925137f7c78170a061877c0cba4f8d8cbe7d61b3a52d71cec178e0ef625e41871009974326c2f7549f739a1339f1a749049a7186800df0b91e2fede324dd69343475594f7c787f158945106f0539315b0b24bd4224f0b1d09b3b7470711c7617c01dc95cda61f5d40e269a1b3bf978f45238c2c807b69aa5ac86557163a123759aee3007850221e0b3e78477bd9d0d134ed60bfc0800278d86c1b896c6605a193cba4fd7ed6fa03f0b868c40906022f0a1dc3f0a753098612c092c54e269d7c51e8645249260102585e2c1a317ed11b3d1e3abaae2713710611c0f2a44c89c7a3cf0c9d6422a6691a8308e04992f1f8bd13941f091df933f227193e004f6559a67ddfc6768f844ed80eb1d52f80e789ddf7bcd423a19388c7183800cf1371c277ef413d143abaaec99f61e0003c8fe1f7dfedb0940753cae112328097153bce134287673b01bc9013b66fad65acfcbab7d2efbdf20c00cb334de3d6cda85f868e6387e8ad00bc909439b776a6fa65e84422acd40560056ead9d7c7fe8a8aa6adb6c9b07600542a1e0e2d4e4fb432718b00c16b200b00a7e5d5fbcac737fe83861a6e700580d9fcf17b4ac474287de0ac00a05176e85df133a7ebf2eed15c3046065a1b3b090a072ef8f59b20bc00a99861433fa2f43e7d64d750078214dd3beef87f5ff051800620545cc719bcf0b0000000049454e44ae426082);";
        }

        #echo $new_account . "<br/>";
        $link->query($new_account);
        #XXX missing checks here too
        $query=$link->query("Select ProfileID from Profile where Email='$email'");
        $result=$query->fetch_row();
        $ProfileID = $result[0];

        #echo $ProfileID . "<br/>";
        $_SESSION['ProfileID'] = $ProfileID;


        header('Location: homepage.php');

    }
 }
 function LogIn(){
    global $link;
    $email=$_POST["Email"];
	$query=$link->query("SELECT Pass, ProfileID FROM Profile WHERE Email = '$email'");
    if($query->num_rows == 0){
        //Should redirect to signup page with error message on top
        $_SESSION['error'] = "no_account";
        //echo "Account doesn't exists.<br/>";
        //echo "Please Sign Up. Redirecting after 5 seconds.<br/>";refresh: 5;
        header('Location: index.php');
    } else {
        $Pass = $_POST["Pass"];
        $result=$query->fetch_row();
        $hashed_password=$result[0];
        if (password_verify($Pass, $hashed_password)) {
            $ProfileID = $result[1];
            $_SESSION['ProfileID'] = $ProfileID;

           header('Location: homepage.php');
        } else {
            //XXX invalid password
            $_SESSION['error'] = "invalid_password";
            header('Location: index.php');
        }
    }
 }
if(isset($_POST['signup'])) {
    #echo 'signup<br/>';
	SignUp();
} elseif (isset($_POST['login'])) {
  //  echo 'login<br/>';
    LogIn();
}
 ?>
