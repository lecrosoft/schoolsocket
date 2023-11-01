const nationalty = document.querySelector("#nationalty");
const states = document.querySelector("#state_of_origin");
const getCountries = async function () {
  try {
    // const options = {
    //   method: "GET",
    //   headers: {
    //     "X-RapidAPI-Key": "85078a233emsh9730b073c6c3d34p1b2213jsnd0840d4514e7",
    //     "X-RapidAPI-Host": "countries-cities.p.rapidapi.com",
    //   },
    // };

    const response = await fetch("https://restcountries.com/v3.1/all");
    const data = await response.json();
    let selectOptions;

    for (d of data) {
      selectOptions = document.createElement("option");
      selectOptions.text = d.name.common;
      selectOptions.value = d.name.common;

      nationalty.appendChild(selectOptions);
    }
  } catch (error) {
    console.log(error);
  }
};
// const getStates = async function () {
//   try {
//     const options = {
//       method: "GET",
//       headers: {
//         "X-RapidAPI-Key": "85078a233emsh9730b073c6c3d34p1b2213jsnd0840d4514e7",
//         "X-RapidAPI-Host": "nigeria-states-and-lga.p.rapidapi.com",
//       },
//     };
//     const stateResponse = await fetch(
//       "https://nigeria-states-and-lga.p.rapidapi.com/lgalists",
//       options
//     );
//     const stateData = await stateResponse.json();
//     let selectOptionsStates;
//     console.log(stateData);
//     for (d of stateData) {
//       selectOptionsStates = document.createElement("option");
//       selectOptionsStates.text = d.name;
//       selectOptionsStates.value = d.name;
//       console.log(selectOptionsStates);
//       states.appendChild(selectOptionsStates);
//     }
//   } catch (error) {
//     console.log(error);
//   }
// };

// getCountries();
// getStates();

// const options = {
//   method: "GET",
//   headers: {
//     "X-RapidAPI-Key": "85078a233emsh9730b073c6c3d34p1b2213jsnd0840d4514e7",
//     "X-RapidAPI-Host": "countries-cities.p.rapidapi.com",
//   },
// };

// fetch("https://restcountries.com/v3.1/all")
//   .then((response) => response.json())
//   .then((response) => console.log(response))
//   .catch((err) => console.error(err));
const removeClass = function (elementSelector, classToRemove) {
  if (
    document.querySelector(elementSelector).classList.contains(classToRemove)
  ) {
    document.querySelector(elementSelector).classList.remove(classToRemove);
  }
};
