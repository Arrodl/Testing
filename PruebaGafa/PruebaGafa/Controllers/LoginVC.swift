//
//  ViewController.swift
//  PruebaGafa
//
//  Created by Gerardo Mathus on 06/03/18.
//  Copyright © 2018 Alfonso Reyna. All rights reserved.
//

import UIKit

class LoginVC: UIViewController {

    @IBOutlet weak var emailEntry: UITextField!
    @IBOutlet weak var passwordEntry: UITextField!
    @IBOutlet weak var forgotPassword: UIButton!
    @IBOutlet weak var loginButton: UIButton!
    @IBOutlet weak var linkButton: UIButton!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        hideKeyboard()
        setupEntries()
        setupButtons()
    }
    
    fileprivate func setupButtons () {
        loginButton.layer.cornerRadius = loginButton.frame.size.height / 2
        loginButton.clipsToBounds = true
        linkButton.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        
        loginButton.addTarget(self, action: #selector(toMainApp), for: .touchUpInside)
    }
    
    func toMainApp() {
        if (validateFields()) {
            let userM = UserModel()
            userM.getUserForLogin(email: emailEntry.text!, password: passwordEntry.text!, onCompletion: { (result, value) in
                if (result) {
                    let alert = UIAlertController(title: "Éxito", message: "Bienvenido \(value.userName!) \(value.userPatName!) \(value.userMatName!)", preferredStyle: .alert)
                    alert.addAction(UIAlertAction(title: "Gracias", style: .default, handler: { (_) in
                        self.userToEdit = value
                        self.performSegue(withIdentifier: "toMainApp", sender: self)
                    }))
                    self.present(alert, animated: true, completion: nil)
                } else {
                    let alert = UIAlertController(title: "Error", message: "El usuario y contraseña no coninciden.", preferredStyle: .alert)
                    alert.addAction(UIAlertAction(title: "Gracias", style: .default, handler: nil))
                    self.present(alert, animated: true, completion: nil)
                }
            })
        }
    }
    
    var userToEdit : User?
    
    override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
        if segue.identifier == "toMainApp" {
            if let controller = segue.destination as? EditVC {
                controller.userToEdit = self.userToEdit!
            }
        }
    }
    
    fileprivate func validateFields() -> Bool {
        if (validateField(textField: emailEntry, name: "Correo") &&
            validateField(textField: passwordEntry, name: "Contraseña")) {
            return true
        }
        return false
    }
    
    fileprivate func setupEntries () {
        emailEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        emailEntry.attributedPlaceholder = NSAttributedString(string: "email", attributes: [NSForegroundColorAttributeName: UIColor.lightGray.withAlphaComponent(0.8)])
        
        passwordEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        passwordEntry.attributedPlaceholder = NSAttributedString(string: "password", attributes: [NSForegroundColorAttributeName: UIColor.lightGray.withAlphaComponent(0.8)])
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
    
}

