import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
import { addSweetDelete } from './sweet_delete';

// *** PROJECT DELETE ***
addSweetDelete('.sweet-delete.btn','.project-container','.project-title');
// *** TYPE DELETE ***
addSweetDelete('.sweet-delete.btn','.type-container','.type-name');