// Options the user could type in
let date=new Date(); 
var currentdate=new Date().toLocaleDateString();
var time=new Date().toLocaleTimeString();
const prompts = [
    ["hi", "hey", "hello", "good morning", "good afternoon"],
    ["how are you", "how is life", "how are things"],
    ["what are you doing", "what is going on", "what is up"],
    ["how old are you"],
    ["who are you", "are you human", "are you bot", "are you human or bot"],
    ["who created you", "who made you"],
    [
      "your name please",
      "your name",
      "may i know your name",
      "what is your name",
      "what call yourself"
    ],
    ["i love you"],
    ["happy", "good", "fun", "wonderful", "fantastic", "cool"],
    ["bad", "bored", "tired"],
    ["help me", "tell me story", "tell me joke"],
    ["ah", "yes", "ok", "okay", "nice"],
    ["bye", "good bye", "goodbye", "see you later"],
    ["what should i eat today"],
    ["bro"],
    ["what", "why", "how", "where", "when"],
    ["no","not sure","maybe","no thanks"],
    [""],
    ["haha","ha","lol","hehe","funny","joke"],
    ["food donate","project" ],
    ["date"],
    ["time"],
    ["what can i donate","donate"],
    ["trust in madurai","ngos in madurai"],
    ["tell joke"],
    ["how can I package my cooked or raw food donations","cooked food donation","raw food donate"],
    ["how my donation is used"],
    ["can i donate cooked food"],
    ["what are the guidelines for donating"]
  ]
  
  // Possible responses, in corresponding order
  
  const replies = [
    ["Hello!", "Hi!", "Hey!", "Hi there!","Howdy"],
    
    [
      "Fine... how are you?",
      "Pretty well, how are you?",
      "Fantastic, how are you?"
    ],
    [
      "Nothing much",
      "About to go to sleep",
      "Can you guess?",
      "I don't know actually"
    ],
    ["I am infinite"],
    ["I am just a bot", "I am a bot. What are you?"],
    
    ["kishor and uppili"],
    ["I am chitti"],
    ["I love you too", "Me too"],
    ["Have you ever felt bad?", "Glad to hear it"],
    ["Why?", "Why? You shouldn't!", "Try watching TV"],
    ["What about?", "Once upon a time..."],
    ["Tell me a story", "Tell me a joke", "Tell me about yourself"],
    // ["varata mame durr"],
    ["Bye", "Goodbye", "See you later"],
    ["Sushi", "Pizza"],
    ["Bro!"],
    ["Great question"],
    ["That's ok","I understand","What do you want to talk about?"],
    ["Please say something :("],
    ["Haha!","Good one!"],
    ["  The basic concept of this project  Food Waste Management is to collect theexcess/leftover food from donors such as hotels, restaurants, marriage halls, etc and distribute to  the  needy people"],
    [currentdate],
    [time],
    ["you can donate raw ,cooked and packed foods"],
    ["Madurai old age Charitable Trust,208, East Veli Street, Near Keshavan Hospital, "],
    ["joke ha ha .."],
    ["You can package your cooked or raw food donations in airtight containers such as Tupperware or plastic bags. You can also use aluminum foil or cling wrap to keep the food fresh. Please make sure to label the containers with the type of food, date, and any relevant instructions"],
     ["Your donation will be used to support our mission and the various programs and initiatives that we have in place. Your donation will help us to continue providing assistance and support to those in need. You can find more information about our programs and initiatives on our website"],
     ["Yes, you can donate cooked food as long as it is prepared in a licensed kitchen, packaged properly and kept at safe temperatures. Please contact us for further instructions and guidelines"],
    ["When donating raw ingredients, please ensure that the items are unopened and unexpired."]
  ]

  
  // Random for any other user input
  
  const alternative = [
    // "Same",
    // "Go on...",
    // "Bro...  i don't know",
    // "Try again",
    // // "I'm listening...:/",
    // "I don't understand ",
    " 😢sorry i am still under development "
  ]
  
  // Whatever else you want :)
  
  const coronavirus = ["Please stay home", "Wear a mask", "Fortunately, I don't have COVID", "These are uncertain times"]