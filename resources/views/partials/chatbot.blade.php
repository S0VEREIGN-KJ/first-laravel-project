<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"> <!-- Google Fonts Link for Icons -->
    <style>
        /* Styles */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
        * {
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        html {
            touch-action: manipulation;
            -ms-touch-action: manipulation; 
        }
        body {
            background: #E3F2FD;
        }
        @keyframes popInOut {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.-); } 
        }
        @keyframes popEffect {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        .chatbot-toggler {
            overflow: auto;
            position: fixed;
            right: 75px;
            bottom: 75px;
            height: 70px;
            width: 70px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            outline: none;
            cursor: pointer;
            background: #4CC9FE;
            border-radius: 50%;
            transition: all 0.2s ease;
            z-index: 2;
            border: 2px solid rgb(0, 0, 0);
            padding: 0;
            animation: popEffect 1.5s infinite ease-in-out;
        }
        .chatbot-toggler img.toggler-img {
            width: 50px; 
            height: 50px;
            object-fit: contain;
            transition: transform 0.2s ease;
        }
        .show-chatbot .chatbot-toggler {
            transform: rotate(90deg);
        }
        .show-chatbot .toggler-img {
            transform: rotate(180deg); 
        }
        @keyframes tooltipEffect {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }
        .chatbot-description {
            animation: tooltipEffect 5s infinite;
        }
        .chatbot{
            position: fixed;
            right:70px;
            bottom: 70px;
            width: 440px;
            height: 740px;
            transform: scale(0.5);
            opacity: 0;
            pointer-events: none;
            overflow: hidden;
            background: #fff;
            border-radius: 15px;
            transform-origin: bottom right;
            box-shadow: 0 0 128 px 0 rgba(0,0,0,0.1),
                        0 32px 64px -48px rgba(0,0,0,0.5);
            transition: all 0.1s ease;
            z-index: 3;
            overflow: auto;
            border: 2px solid #4CC9FE;
        }
        .chatbot-description {
            position: fixed;
            right: 130px;
            bottom: 130px;
            transform: translateX(50%);
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            z-index: 3;
        }
        .show-chatbot .chatbot{
            transform: scale(1);
            opacity: 1;
            pointer-events: auto;
        }
        .chatbot header{
            background: #4CC9FE;
            padding: 14px;
            text-align: center;
            display: flex;
            height: 90px;
        }
        .chat header h2{
            color: #fff;
            font-size: 1.4rem;
        }
        .chatbot header span{
            position: absolute;
            right: 30px;
            top: 6%;
            color: #fff;
            cursor: pointer;
            display: block;
            transform: translateY(-50%);
        }
        .header-text-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center; 
        }
        .header-text {
            font-size: 15px; 
            font-weight: bold;
            color: black;
            margin: 0; 
        }
        .header-text2 {
            font-size: 30px; 
            font-weight: bold;
            color: black;
            margin: 0; 
            margin-left: 25px;
            text-align: left;
        }
        .header::after {
            content: '';
            position: absolute;
            bottom: -20px; 
            left: 0;
            width: 100%;
            height: 40px; 
            background: #4CC9FE; 
            border-radius: 50% 50% 0 0;
        }
        .chatbot .chatbox {
            height: 510px;
            overflow-y: auto;
            padding: 30px 20px 100px;
        }
        .chatbot .chat {
            display: flex;
        }
        .chatbot .incoming span{
            height: 32px;
            width: 32px;
            color: #fff;
            align-self: flex-end;
            background: #4CC9FE;
            text-align:center;
            line-height: 32px;
            border-radius: 4px;
            margin: 0 10px 0;
        }
        .chatbot .outgoing {
    margin: 20px 0;
    justify-content: flex-end;
    position: relative;
    
}

.chatbot .outgoing p {
    font-weight: bold;
    position: relative;
    color: #fff;
    max-width: 75%;
    font-size: 0.95rem;
    white-space: pre-wrap;
    padding: 12px 16px;
    background: #4CC9FE;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Triangle tail on the right */
.chatbot .outgoing p::before {
    content: "";
    position: absolute;
    top: 0;
    right: -10px;
    width: 0;
    height: 0;
    border-bottom: 10px solid transparent;
    border-left: 10px solid #4CC9FE;
    
}
        .chatbot .chat p {
            max-width: 75%;
            font-size: 0.95rem;
            white-space: pre-wrap;
            padding: 12px 16px;
            border-radius: 10px 0 10px 10px;
            background: linear-gradient(to right, #4CC9FE, #12D8FA,  #4CC9FE, #12D8FA);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .chatbot .chat p.error {
        color: #721c24;
            background: #f8d7da;
        }
        .chatbot .incoming p {
            color: white;
    margin-top: 10px;
    position: relative;
    color: #000;
    background:rgb(255, 255, 255);
    border: 1px solid black;
    border-radius: 0 10px 10px 10px;
    width: 360px;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.chatbot .incoming p::before {
    content: "";
    position: absolute;
    top: -1px;
    left: -10px;
    width: 0;
    height: 0;
    border-bottom: 10px solid transparent;
    border-right: 10px solid rgb(0, 0, 0);
}
        .chatbot .chat-input{
            position: absolute;
            bottom: 0;
            width: 100%;
            display: flex;
            gap: 5px;
            background: #fff;
            align-items: flex-end;
            padding: 5px 20px;
            border-top: 1px solid #ccc;
        } 
        .chat-input textarea {
            height: 55px;
            width: 100%;
            max-height: 180px;
            overflow: hidden;
            border: none;
            outline: none;
            font-size: 0.95rem;
            resize: none;
            padding: 16px 15px 16px 0;
        }
        .chat-input span{
            align-self: flex-end;
            height: 55px;
            line-height: 55px;
            color:rgba(58, 0, 231, 0.9);
            font-size: 1.35em;
            cursor: pointer;
            visibility: hidden;
        }
        .chat-input textarea:valid ~ span{
            visibility: visible;
        }
        .chat .dialog-options {
    display: flex;
    gap: 10px;
    padding: 10px;
    background: #fff;
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    flex-wrap: wrap;
    justify-content: center;
    bottom: 0;
    width: 100%;

}

.chat .dialog-options button {
    color: black;
    background: linear-gradient(to right, #4CC9FE, #12D8FA,  #4CC9FE, #12D8FA);
    border-radius: 25px;
    padding: 8px 12px;
    cursor: pointer;

}

.chat .dialog-options button:hover {
    background: rgb(118, 191, 223);
}
        .chat-icon{
            min-width: 40px; 
            display: flex;
            justify-content: center;
        }
        .chat-icon img {
            border: 2px solid rgb(0, 0, 0);
            border-radius: 50%;
            width: 30px;
            height: 30px; 
            margin-left: -10px;
            object-fit: contain;
        }
        .header-icon-wrapper {
            width: 60px; 
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white; 
            border: 2px solid rgb(255, 255, 255); 
            border-radius: 50%;
        }
        .header-icon {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .close-btn {
            font-family: 'Material Symbols Outlined', sans-serif;
            font-size: 24px;
            color: #333; 
            cursor: pointer;
            transition: color 0.3s ease, transform 0.2s ease;
            padding: 5px;
            border-radius: 50%;
        }
        .send-btn {
            font-size: 55;
        }
        .close-btn:hover {
            color: #ff3b30; 
        }
        .close-btn:active {
            color: #d32f2f; 
        }
        
        @keyframes scroll_4013 {
            0% {transform: translateY(40%);
            }50% {
            transform: translateY(90%);
            }100% {
            transform: translateY(40%);}
        }
        .chatbox::-webkit-scrollbar {
            width: 10px; 
            height: 10px; 
        }
        .chatbox::-webkit-scrollbar-thumb {
            background-color: rgb(105, 127, 255); 
            border-radius: 10px; 
            box-shadow: 0px 0px 10px rgb(105, 127, 255); 
        }
        .chatbox::-webkit-scrollbar-thumb:hover {
            background-color: rgb(85, 102, 204); 
        }
        .chatbox::-webkit-scrollbar-track {
            background-color: rgba(105, 127, 255, 0.2); 
            border-radius: 10px; 
        }
        .chatbox::-webkit-scrollbar-track-piece {
            background-color: transparent; 
        }
        .custom-shape-divider-bottom-1743647769 {
            position: absolute;
            display: block;
            left: 0;
            width: 100%;
            overflow: hidden;
            z-index: 999;
        }
        .custom-shape-divider-bottom-1743647769 svg {
            position: relative;
            display: block;
            width: calc(179% + 1.3px);
            height: 30px;
            transform: rotateY(180deg);
            z-index: 999;
        }
        .custom-shape-divider-bottom-1743647769 .shape-fill {
            fill: #4CC9FE ; 
            z-index: 999;
        }
        .green-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color:rgb(0, 255, 64);
        border-radius: 50%;
        margin-right: 337px;
        margin-top: 25px;
        vertical-align: middle;
        }
        #send-btn {
        font-size: 32px;
        }


    </style>
</head>

<body>

    <div class="chatbot-description">Click me!</div>

        <button class="chatbot-toggler">
            <img class="toggler-img" src="{{ asset('images/DOST.png') }}" alt="Chatbot Toggler">
        </button>

        <ul class="chatbot">
            <header>
                <div class="header-icon-wrapper">
                    <img class="header-icon" src="{{ asset('images/DOST.png') }}" alt="Header Icon">
                </div>

                <div class="header-text-wrapper">
                    <p class="header-text">Department of Science and Technology</p>
                    <span class="green-dot"></span>
                    <p class="header-text2">CHATBOT</p>
                </div>
                
                <span class="close-btn material-symbols-outlined">close</span>

            </header>
            <div class="custom-shape-divider-bottom-1743647769">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
            <ul div class="chatbox">        
          
        </ul>
        <div class="dialog-options"></div>
      
        <div class="chat-input">
            <textarea placeholder="Enter a message..." required></textarea>
            <span id="send-btn" class="material-symbols-outlined">send</span>

    </div>
</body>

<script>
    const chatInput = document.querySelector(".chat-input textarea");
    const sendChatBtn = document.querySelector(".chat-input span");
    const chatbox = document.querySelector('.chatbox');
    const dialogOptions = document.querySelector('.dialog-options');
    const chatbotToggler = document.querySelector(".chatbot-toggler");
    const chatbotCloseBtn = document.querySelector(".close-btn");
    const chatTextarea = document.querySelector(".chat-input textarea");

const createChatLi = (message, className) => {
//Create a chat <li> element with passed message and className
const chatLi = document.createElement("li");
chatLi.classList.add("chat", className);
let chatContent = className === "outgoing" ? `<p>${message}</p>` : `<span class="material-symbols-outlined">smart_toy</span><p>${message}</p>`;
chatLi.innerHTML = chatContent;
chatLi.querySelector("p").textContent = message;
return chatLi;
}
const dialogFlow = {
    start: {
        message: "Hi there! I'm here to support your mental well-being. How can I assist you today?",
        options: [
            { label: "Talk about feelings", next: "feelings" },
            { label: "Learn coping strategies", next: "coping" },
            { label: "Connect with a professional", next: "professional" }
        ]
    },
    feelings: {
        message: "I'm here to listen. Can you share how you're feeling?",
        options: [
            { label: "I'm feeling anxious", next: "anxiety" },
            { label: "I'm feeling down", next: "low_mood" }
        ]
    },
    anxiety: {
        message: "I'm sorry to hear you're feeling anxious. Here are some strategies that might help:",
        options: [
            { label: "Breathing exercises", next: "breathing" },
            { label: "Talk to someone", next: "professional" }
        ]
    },
    low_mood: {
        message: "I'm sorry to hear you're feeling down. Here are some options that might help:",
        options: [
            { label: "Positive affirmations", next: "affirmations" },
            { label: "Connect with a professional", next: "professional" }
        ]
    },
    breathing: {
        message: "Breathing exercises can help calm your mind. Try inhaling for 4 seconds, holding for 7 seconds, and exhaling for 8 seconds.",
        options: [
            { label: "More help", next: "anxiety" },
            { label: "End chat", next: null }
        ]
    },
    affirmations: {
        message: "Here are some affirmations to try: 'I am strong and capable', 'This feeling will pass', 'I am worthy of love and happiness'.",
        options: [
            { label: "More help", next: "low_mood" },
            { label: "End chat", next: null }
        ]
    },
    coping: {
        message: "Coping strategies can help manage stress and emotions. Which would you like to explore?",
        options: [
            { label: "Mindfulness", next: "mindfulness" },
            { label: "Physical activity", next: "physical_activity" }
        ]
    },
    mindfulness: {
        message: "Mindfulness involves being present in the moment. Try a simple activity like focusing on your breath or noticing sensations around you.",
        options: [
            { label: "More coping strategies", next: "coping" },
            { label: "End chat", next: null }
        ]
    },
    physical_activity: {
        message: "Physical activity can help release stress. Even a short walk or stretching can make a difference.",
        options: [
            { label: "More coping strategies", next: "coping" },
            { label: "End chat", next: null }
        ]
    },
    professional: {
        message: "Connecting you to a mental health professional... Please wait.",
        options: [
            { label: "End chat", next: null }
        ]
    }
};

const loadDialog = (step) => {
    const currentStep = dialogFlow[step];

    // Add thinking message
    chatbox.innerHTML += `
        <div class="chat incoming thinking">
            <div class="chat-icon">
                <img src="{{ asset('images/DOST.png') }}" alt="Chat Icon" class="chat-icon-img">
            </div>
            <div class="chat-text">
                <p>Thinking...</p>
            </div>
        </div>`;

    chatbox.scrollTo(0, chatbox.scrollHeight);

    setTimeout(() => {
        // Remove thinking message
        document.querySelector('.thinking')?.remove();

        // If no step exists, show thank you message
        if (!currentStep) {
            chatbox.innerHTML += `
                <div class="chat incoming">
                    <div class="chat-icon">
                        <img src="{{ asset('images/DOST.png') }}" alt="Chat Icon" class="chat-icon-img">
                    </div>
                    <div class="chat-text">
                        <p>Thank you for chatting with us!</p>
                    </div>
                </div>`;
            dialogOptions.innerHTML = '';
            return;
        }

        // Add the message for the current step
        chatbox.innerHTML += `
    <div class="chat incoming previous-dialog" data-step="${step}">
        <div class="chat-icon">
            <img src="{{ asset('images/DOST.png') }}" alt="Chat Icon" class="chat-icon-img">
        </div>
        <div class="chat-text">
            <p>${currentStep.message}</p>
        </div>
    </div>`;

        // Add the dialog options for this step
        const optionsContainer = document.createElement('div');
optionsContainer.classList.add('chat', 'incoming');

const optionsText = document.createElement('div');
optionsText.classList.add('chat-text', 'dialog-options');

currentStep.options.forEach(option => {
    const button = document.createElement('button');
    button.textContent = option.label;
    button.addEventListener('click', () => handleOptionClick(option.label, option.next));
    optionsText.appendChild(button);
});

optionsContainer.appendChild(optionsText);
chatbox.appendChild(optionsContainer);


        chatbox.scrollTo(0, chatbox.scrollHeight);
    }, 1000);
};

const handleOptionClick = (label, next) => {
    // Add the selected option to the chatbox
    chatbox.innerHTML += `
        <div class="chat outgoing">
            <p>${label}</p>
        </div>`;

    chatbox.scrollTo(0, chatbox.scrollHeight);

    // Load the next dialog step
    loadDialog(next);
};


sendChatBtn.addEventListener('click', () => {
let userMessage = chatInput.value.trim().toLowerCase();
if (!userMessage) return;

chatbox.innerHTML += `<div class="chat outgoing"><p>${chatInput.value}</p></div>`;
chatInput.value = "";
chatbox.scrollTo(0, chatbox.scrollHeight);

let matchedStep = Object.keys(dialogFlow).find(key => key.includes(userMessage.replace(/ /g, "_")));
loadDialog(matchedStep || "start");
});



const handleChat = () => {
userMessage = chatInput.value.trim();
if(!userMessage) return;
chatInput.value = "";
chatInput.style.height = `${chatInput.scrollHeight}px`;

//Append the user's message to the chatbox
chatbox.appendChild(createChatLi(userMessage, "outgoing"));
chatbox.scrollTo(0, chatbox.scrollHeight);        //auto scroll chat

setTimeout(() => {
    //Display "Thinking..." message while waiting for the response
    const incomingChatLi = createChatLi("Thinking...", "incoming");
    chatbox.appendChild(incomingChatLi);
    chatbox.scrollTo(0, chatbox.scrollHeight);     //auto scroll chat
    chatbox.offsetHeight; // Trigger reflow
    generateResponse(incomingChatLi);
}, 600);
}

chatbox.addEventListener('click', (e) => {
    const target = e.target.closest('.previous-dialog');
    if (target && target.dataset.step) {
        const step = target.dataset.step;
        loadDialog(step);
    }
});


chatInput.addEventListener("input", () => {
//Adjust the height of the input textarea based on its content
chatInput.style.height = `${inputInitHeight}px`;
chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    sendChatBtn.click();
}
});

chatTextarea.addEventListener("input", () => {
chatTextarea.style.height = "55px"; // Reset height
chatTextarea.style.height = `${chatTextarea.scrollHeight}px`; // Adjust height based on content
dialogOptions.style.bottom = `${chatTextarea.scrollHeight + 10}px`; // Move dialog options accordingly
});

chatInput.addEventListener("input", () => {
chatInput.style.height = "55px"; // Reset to default height
chatInput.style.height = chatInput.scrollHeight + "px"; // Expand downward
});

const closeChatbot = () => {
chatbot.style.display = 'none';
};


chatbotCloseBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));  //CLOSE FUNCTION


chatbotToggler.addEventListener("click", () => {
document.body.classList.toggle("show-chatbot");

if (document.body.classList.contains("show-chatbot")) {
    // Reset chatbot content when reopened
    chatbox.innerHTML = "";  // Clear previous chat history
    dialogOptions.innerHTML = ""; // Clear previous options
    loadDialog('start'); // Load the initial dialog
}
});




</script>


</body>

</html>


