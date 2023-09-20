import React from 'react'
import { displayPopup } from '/functions/popup'
import { Avatar } from './Avatar'

export const TopBarAvatar = () =>
{    
    /**
     * @param {Event} e 
     */
    const handleDisplayPopup = function (e) {
        e.stopPropagation()
        const position = e.currentTarget.getBoundingClientRect().left
        
        // Definir quelle type de pop up afficher
        // Definir la position où il doit s'afficher 
        // Afficher le pop up
        displayPopup(position, 'menu')        
    }

    return (
        <button onClick={handleDisplayPopup}>
            <Avatar user={{fullname: 'Imamou Mina'}}/>
        </button>
    )
}