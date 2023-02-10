<!doctype html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <label class="block w-[70%] p-5 mt-5">
        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
            Pelase Fill : NAME[space]AGE[space]CITY[space]NAME[space]AGE[space]CITY ...etc
        </span>
        <input type="text" id="get-input"
            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
            placeholder="" />
    </label>
    <div>
        <button class="save rounded-lg bg-emerald-600 ml-5 px-3 py-2 text-stone-200 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200">Save Changes</button>
    </div>
    <div class="p-2 ml-3 mt-5">Result :</div>
    <div class="ml-5 mt-5 animload">
        <svg class="w-12 h-12 animate-spin text-indigo-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 4.75V6.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M17.1266 6.87347L16.0659 7.93413" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M19.25 12L17.75 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M17.1266 17.1265L16.0659 16.0659" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M12 17.75V19.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M7.9342 16.0659L6.87354 17.1265" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M6.25 12L4.75 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M7.9342 7.93413L6.87354 6.87347" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
    </div>
    <div id="weather-temp" class="mt-5 ml-5 w-[30%]"></div>
    <script>
    $(document).ready(function() {
        $(".animload").hide();
        $('.save').prop('disabled', false);
        $(".save").click(function() {
            $("#weather-temp").hide();
            $('.save').prop('disabled', true);
            $(".animload").show();
            preSubmit();
            $.ajax({
                url: "http://localhost:8000/api/save",
                data: {data : preSubmit()},
                dataType: 'json',
                type: "POST",
                success: function(result) {
                    $("#weather-temp").html("<strong>" + JSON.stringify(result) +
                        "</strong>");
                        $(".animload").hide();
                        $("#weather-temp").show();
                        $('.save').prop('disabled', false);
                }
            });
        });

        function preSubmit() {
            let value = []
            let getInp = $("#get-input").val();
            let myArray = getInp.split(" ")
            let count = myArray.length / 3
            for(let i in myArray){
                if(i % 3 === 0){
                    let getN = Number(i)
                    value.push({
                       name : myArray[i],
                       age : myArray[getN+1],
                       city : myArray[getN+2] 
                    })
                }
            }
            return value
        }
    });
    </script>
</body>

</html>