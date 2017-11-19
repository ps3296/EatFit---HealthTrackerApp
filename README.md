<h2> EatFit </h2>

HealthApp is a web-based application that suggests you recipes based on the calorie requirement and keyword specified by the user. 
The keyword can be an ingredient name  like eggs or any adjective related to the recipes; example : green. We have provided a filter based on the calorie. 
The user can input a calorie range and the recipes suggested will fall in that range. 

The required calorie per day is estimated by the BMR of the user which is calculated on multiple factors including the age, height, weight, lifestyle(sedentary,light exercise, heavy exercise etc) of the user. 
These information bits are taken as input from the user at registration time and are stored in the profile of the user.

Upon finding an interesting recipe, the user can mark it for breakfast, lunch or dinner. 
This helps HealthApp  in keeping track of the calorie intake for each meal and monitors your intake. 
There is a possibility that the user might eat a midday meal like a snack. As these calories are also important aspects to be considered during monitoring the calories, the application provides an option add any additional calorie intake. 

The Recipes are from edamam API which uses a collection of recipes from multiple sources and gives the details of the recipe as response including the calories, ingredients and health labels (like low sodium, low carb etc).

The application also has a recommendation module which recommends recipes to the user based on user past eaten recipes. 
The application uses a similarity function which finds the match between the recipes eaten by all users.
When the similarity between two recipes is more than 30%, and the user has not already used that particular recipe, it is suggested to the user. 
For example if a user xyz has eaten egg omelet and another user pqr has eaten egg toast, then the two users might have similar interests. 
Hence egg toast is suggested to the user xyz.

To alleviate the issue of missing ingredients in the pantry, upon selection of the recipe for a meal, the user is given option to place order through Amazon. 
This feature adds all the ingredients in the amazon cart and allows you to place an order of all the items required ingredients. 
So forget about any missing ingredients for tomorrow’s lunch. Just click through, select, place order and cook.
