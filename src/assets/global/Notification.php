<?php

namespace App\src\assets\global;

class Notification
{
    function __construct($content)
    {
        echo "
            <section id='Notification'>
                <article id='title'>
                    <h1>Message</h1>
                    <i id='close'> &times;</i>
                </article>
                <article id='conent'>
                    <p>{$content}</p>
                </article> 
                <style>
                    #Notification {
                    width: 300px;
                    height: auto;
                    top: 10px;
                    right: -300px;
                    padding: 0 1%;
                    background-color: #2E2C2C;
                    position: fixed;
                    animation-name: slideInRight;
                    animation-duration: 1s;
                    animation-timing-function: linear;
                    animation-fill-mode: forwards;
                    transition: 1s linear; 
                    z-index: 9999;
                    }

                    #title{
                        width: 100%;
                        height: 20%;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }

                    #title h1{
                        font-size: 1.2rem;
                        color: #FFFFFF;
                        }
                    #title #close {
                        font-size: 2rem;
                        color: #FFFFFF;
                        }
                    #title #close:hover{
                        cursor: pointer;
                        color: #F7C427;
                        }
                    #conent{
                        width: 100%;
                        height: 100%;
                        padding: 2%;
                        color: #585353;
                        flex-wrap: wrap;

                    }
                    p{
                    font-size: 1rem;
                    }

                    @keyframes slideInRight {
                        0% {
                        right: -300px;
                        }

                        100% {
                        right: 20px;
                        }
                    }
                </style>
                <script>
                    document.getElementById('close').addEventListener('click', function () {
                        var notificationElement = document.getElementById('Notification');
                        notificationElement.parentNode.removeChild(notificationElement);
                    });
                </script>
            </section>
        ";
    }
}
