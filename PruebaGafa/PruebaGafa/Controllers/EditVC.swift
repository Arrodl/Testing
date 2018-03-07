//
//  EditVC.swift
//  PruebaGafa
//
//  Created by Gerardo Mathus on 06/03/18.
//  Copyright © 2018 Alfonso Reyna. All rights reserved.
//

import UIKit

class EditVC: UIViewController {
    
    var userToEdit : User?

    @IBOutlet weak var signOutButton: UIButton!
    
    // Entries
    @IBOutlet weak var nameEntry: UITextField!
    @IBOutlet weak var firstSurnameEntry: UITextField!
    @IBOutlet weak var secondSurNameEntry: UITextField!
    @IBOutlet weak var passwordEntry: UITextField!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        hideKeyboard()
        self.navigationItem.setHidesBackButton(true, animated: true)
        setupButton()
        signOutButton.addTarget(self , action: #selector(signOut), for: .touchUpInside)
        setupEntries()
    }
    
    fileprivate func setupEntries () {
        nameEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        firstSurnameEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        secondSurNameEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        passwordEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        
        nameEntry.text = userToEdit?.userName!
        firstSurnameEntry.text = userToEdit?.userPatName!
        secondSurNameEntry.text = userToEdit?.userMatName!
        passwordEntry.text = userToEdit?.password!
    }
    
    func signOut () {
        self.navigationController?.popToRootViewController(animated: true)
//        let input = "unacontraseña"
//        let digest = input.utf8.md5
//        print(digest)
    }

    @IBOutlet weak var sendButton: UIButton!

    fileprivate func setupButton () {
        sendButton.layer.cornerRadius = sendButton.frame.size.height / 2
        sendButton.clipsToBounds = true
        
        sendButton.addTarget(self, action: #selector (updateAction) , for: .touchUpInside)
    }
    
    func updateAction () {
        if validateAllFields() {
            let userM = UserModel()
            userM.updateUserDAta(user: self.userToEdit!, onCompletion: {
                result in
                if result {
                    let alert = UIAlertController(title: "Éxito", message: "Se han actualizado tus datos correctamente", preferredStyle: .alert)
                    alert.addAction(UIAlertAction(title: "Ok", style: .default, handler: nil))
                    self.present(alert, animated: true, completion: nil)
                } else {
                    let alert = UIAlertController(title: "Error", message: "Hubo un problema con la conexión al servicor, intentalo mas tarde.", preferredStyle: .alert)
                    alert.addAction(UIAlertAction(title: "Ok", style: .default, handler: nil))
                    self.present(alert, animated: true, completion: nil)
                }
            })
        }
    }
    
    fileprivate func validateField (textField : UITextField, name: String) -> Bool {
        if( !(textField.text?.isEmpty)!) {
            return true
        } else {
            if (textField.text?.isEmpty)! {
                let alert = UIAlertController(title: "Error", message: "\(name) no debe estar vacio.", preferredStyle: .alert)
                alert.addAction(UIAlertAction(title: "Ok", style: .default, handler: nil))
                self.present(alert, animated: true, completion: nil)
                return false
            } else {
                let alert = UIAlertController(title: "Error", message: "\(name) no debe ser menor a 3 caracteres.", preferredStyle: .alert)
                self.present(alert, animated: true, completion: nil)
                return false
            }
        }
    }
    
    fileprivate func validateAllFields () -> Bool {
        if (validateField(textField: nameEntry, name: "Nombre") &&
            validateField(textField: firstSurnameEntry, name: "Apellido paterno") &&
            validateField(textField: secondSurNameEntry, name: "Apellido materno") &&
            validateField(textField: passwordEntry, name: "Contraseña")) {
            self.userToEdit?.userName = nameEntry.text
            self.userToEdit?.userPatName = firstSurnameEntry.text
            self.userToEdit?.userMatName = secondSurNameEntry.text
            let pass = passwordEntry.text!
            self.userToEdit?.password = "\(pass.utf8.md5)"
            return true
        }
        return false
    }
    
}
