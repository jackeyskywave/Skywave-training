<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>
    <h1>Hello,{{ $name ?? 'Guest' }}</h1>

    <!--if...else statement-->
    @if ($name != '')
        {{ 'Name is ' . $name }}
    @elseif($name == 'Prachi')
        {{ 'Name is Prachi.' }}
    @else
        {{ 'Name is empy.' }}
    @endif

    <!-- unless -->
    @unless ($name == 'Prachi')
        {{ 'Name is not Prachi.' }}
    @endunless
    {{-- {!! $demo !!} --}}
    {{-- {{ date('d-m-y') }} --}}

    <!-- isset() -->
    @isset($name)
        {{ $name }}
    @endisset
    <br>
    <div class="container">
        <!--for loop-->
        @for ($i = 1; $i < 11; $i++)
            <h2>{{ $i }}</h2>
        @endfor

        <!--while loop-->
        @php
            $i = 11;
        @endphp
        @while ($i < 21)
            <h2>{{ $i }}</h2>
            @php
                $i++;
            @endphp
        @endwhile

        <!--foreach loop-->
        @php
            $arr = [21, 22, 23, 24, 25, 26, 27, 28, 29, 30];
        @endphp
        @foreach ($arr as $i)
            <h2>{{ $i }}</h2>
        @endforeach

        @php
            $countries = [
                'Afghanistan',
                'Albania',
                'Algeria',
                'American Samoa',
                'Andorra',
                'Angola',
                'Anguilla',
                'Antarctica',
                'Antigua and Barbuda',
                'Argentina',
                'Armenia',
                'Aruba',
                'Australia',
                'Austria',
                'Azerbaijan',
                'Bahamas',
                'Bahrain',
                'Bangladesh',
                'Barbados',
                'Belarus',
                'Belgium',
                'Belize',
                'Benin',
                'Bermuda',
                'Bhutan',
                'Bolivia',
                'Bosnia and Herzegowina',
                'Botswana',
                'Bouvet Island',
                'Brazil',
                'British Indian Ocean Territory',
                'Brunei Darussalam',
                'Bulgaria',
                'Burkina Faso',
                'Burundi',
                'Cambodia',
                'Cameroon',
                'Canada',
                'Cape Verde',
                'Cayman Islands',
                'Central African Republic',
                'Chad',
                'Chile',
                'China',
                'Christmas Island',
                'Cocos (Keeling) Islands',
                'Colombia',
                'Comoros',
                'Congo',
                'Congo, the Democratic Republic of the',
                'Cook Islands',
                'Costa Rica',
                "Cote d'Ivoire",
                'Croatia (Hrvatska)',
                'Cuba',
                'Cyprus',
                'Czech Republic',
                'Denmark',
                'Djibouti',
                'Dominica',
                'Dominican Republic',
                'East Timor',
                'Ecuador',
                'Egypt',
                'El Salvador',
                'Equatorial Guinea',
                'Eritrea',
                'Estonia',
                'Ethiopia',
                'Falkland Islands (Malvinas)',
                'Faroe Islands',
                'Fiji',
                'Finland',
                'France',
                'France Metropolitan',
                'French Guiana',
                'French Polynesia',
                'French Southern Territories',
                'Gabon',
                'Gambia',
                'Georgia',
                'Germany',
                'Ghana',
                'Gibraltar',
                'Greece',
                'Greenland',
                'Grenada',
                'Guadeloupe',
                'Guam',
                'Guatemala',
                'Guinea',
                'Guinea-Bissau',
                'Guyana',
                'Haiti',
                'Heard and Mc Donald Islands',
                'Holy See (Vatican City State)',
                'Honduras',
                'Hong Kong',
                'Hungary',
                'Iceland',
                'India',
                'Indonesia',
                'Iran (Islamic Republic of)',
                'Iraq',
                'Ireland',
                'Israel',
                'Italy',
                'Jamaica',
                'Japan',
                'Jordan',
                'Kazakhstan',
                'Kenya',
                'Kiribati',
                "Korea, Democratic People's Republic of",
                'Korea, Republic of',
                'Kuwait',
                'Kyrgyzstan',
                "Lao, People's Democratic Republic",
                'Latvia',
                'Lebanon',
                'Lesotho',
                'Liberia',
                'Libyan Arab Jamahiriya',
                'Liechtenstein',
                'Lithuania',
                'Luxembourg',
                'Macau',
                'Macedonia, The Former Yugoslav Republic of',
                'Madagascar',
                'Malawi',
                'Malaysia',
                'Maldives',
                'Mali',
                'Malta',
                'Marshall Islands',
                'Martinique',
                'Mauritania',
                'Mauritius',
                'Mayotte',
                'Mexico',
                'Micronesia, Federated States of',
                'Moldova, Republic of',
                'Monaco',
                'Mongolia',
                'Montserrat',
                'Morocco',
                'Mozambique',
                'Myanmar',
                'Namibia',
                'Nauru',
                'Nepal',
                'Netherlands',
                'Netherlands Antilles',
                'New Caledonia',
                'New Zealand',
                'Nicaragua',
                'Niger',
                'Nigeria',
                'Niue',
                'Norfolk Island',
                'Northern Mariana Islands',
                'Norway',
                'Oman',
                'Pakistan',
                'Palau',
                'Panama',
                'Papua New Guinea',
                'Paraguay',
                'Peru',
                'Philippines',
                'Pitcairn',
                'Poland',
                'Portugal',
                'Puerto Rico',
                'Qatar',
                'Reunion',
                'Romania',
                'Russian Federation',
                'Rwanda',
                'Saint Kitts and Nevis',
                'Saint Lucia',
                'Saint Vincent and the Grenadines',
                'Samoa',
                'San Marino',
                'Sao Tome and Principe',
                'Saudi Arabia',
                'Senegal',
                'Seychelles',
                'Sierra Leone',
                'Singapore',
                'Slovakia (Slovak Republic)',
                'Slovenia',
                'Solomon Islands',
                'Somalia',
                'South Africa',
                'South Georgia and the South Sandwich Islands',
                'Spain',
                'Sri Lanka',
                'St. Helena',
                'St. Pierre and Miquelon',
                'Sudan',
                'Suriname',
                'Svalbard and Jan Mayen Islands',
                'Swaziland',
                'Sweden',
                'Switzerland',
                'Syrian Arab Republic',
                'Taiwan, Province of China',
                'Tajikistan',
                'Tanzania, United Republic of',
                'Thailand',
                'Togo',
                'Tokelau',
                'Tonga',
                'Trinidad and Tobago',
                'Tunisia',
                'Turkey',
                'Turkmenistan',
                'Turks and Caicos Islands',
                'Tuvalu',
                'Uganda',
                'Ukraine',
                'United Arab Emirates',
                'United Kingdom',
                'United States',
                'United States Minor Outlying Islands',
                'Uruguay',
                'Uzbekistan',
                'Vanuatu',
                'Venezuela',
                'Vietnam',
                'Virgin Islands (British)',
                'Virgin Islands (U.S.)',
                'Wallis and Futuna Islands',
                'Western Sahara',
                'Yemen',
                'Yugoslavia',
                'Zambia',
                'Zimbabwe',
            ];
            
        @endphp
        <select>
        @foreach ($countries  as $country)
            <option>{{ $country}}</option>
        @endforeach
        </select>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
