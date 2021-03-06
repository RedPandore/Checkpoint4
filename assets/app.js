/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
require('bootstrap');
// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';
import AOS from 'aos';
import 'aos/dist/aos.css';


// start the Stimulus application
import { Tooltip, Toast, Popover } from 'bootstrap';
import './bootstrap';

AOS.init();