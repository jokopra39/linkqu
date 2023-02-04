<!doctype html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <label class="block w-[50%] p-5 mt-5">
        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
            Pelase Fill : NAME[space]AGE[space]CITY
        </span>
        <input type="text" id="get-input"
            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
            placeholder="NAME[space]AGE[space]CITY" />
    </label>
    <div>
        <button class="save rounded-lg bg-emerald-600 ml-5 px-3 py-2 text-stone-200">Save Changes</button>
    </div>
    <div class="p-2 ml-3 mt-5">Result :</div>
    <div id="weather-temp" class="mt-9 ml-5 w-[30%]"></div>
    <script>
    $(document).ready(function() {
        $(".save").click(function() {
            $.ajax({
                url: "http://localhost:8000/api/save",
                data: preSubmit(),
                dataType: 'json',
                type: "POST",
                success: function(result) {
                    $("#weather-temp").html("<strong>" + JSON.stringify(result) +
                        "</strong>");
                }
            });
        });

        function preSubmit() {
            let value = {}
            let getInp = $("#get-input").val();
            let myArray = getInp.split(" ")
            let name = myArray[0];
            let age = myArray[1];
            let city = myArray[2];
            value.name = name;
            value.age = age;
            value.city = city;
            return value
        }
    });
    </script>
</body>

</html>