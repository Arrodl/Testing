//
//  RegisterVC.swift
//  PruebaGafa
//
//  Created by Gerardo Mathus on 06/03/18.
//  Copyright © 2018 Alfonso Reyna. All rights reserved.
//

import UIKit

class RegisterVC: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()
        hideKeyboard()
        setupEntries()
        setupButton()
    }
    
    @IBOutlet weak var nameEntry: UITextField!
    @IBOutlet weak var patNameEntry: UITextField!
    @IBOutlet weak var matNameEntry: UITextField!
    @IBOutlet weak var emailEntry: UITextField!
    @IBOutlet weak var passwordEntry: UITextField!
    
    @IBOutlet weak var registerButton: UIButton!
    
    fileprivate func setupButton () {
        registerButton.layer.cornerRadius = registerButton.frame.size.height / 2
        registerButton.clipsToBounds = true
        registerButton.addTarget(self, action: #selector(toMainApp), for: .touchUpInside)
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
            validateField(textField: patNameEntry, name: "Apellido paterno") &&
            validateField(textField: matNameEntry, name: "Apellido materno") &&
            validateField(textField: emailEntry, name: "Correo") &&
            validateField(textField: passwordEntry, name: "Contraseña")) {
            if (isValidEmail(testStr: emailEntry.text!)) {
                return true
            } else {
                let alert = UIAlertController(title: "Error", message: "Debe ingresar un correo valido", preferredStyle: .alert)
                alert.addAction(UIAlertAction(title: "Ok", style: .default, handler: nil))
                self.present(alert, animated: true, completion: nil)
                return false
            }
        }
        return false
    }
    
    fileprivate func isValidEmail(testStr : String) -> Bool {
        let emailRegEx = "[A-Z0-9a-z._%+-]+@[A-Za-z0-9,-]+\\.[A-Za-z]{2,}"
        let emailTest = NSPredicate(format: "SELF MATCHES %@", emailRegEx)
        return emailTest.evaluate(with:testStr)
    }
    
    func toMainApp() {
        if (validateAllFields()) {
            let userM = UserModel()
            registerButton.isEnabled = false
            userM.postUser(user: User(name: nameEntry.text!,
                                      patName: passwordEntry.text!,
                                      matName: matNameEntry.text!,
                                      password: passwordEntry.text!,
                                      email: emailEntry.text!,
                                      status: 0), onCompletion: { result, value in
                if result {
                    let alert = UIAlertController(title: "Éxito", message: "Tu cuenta se completo exitosamente, revisa tu correo para detalles de confirmación", preferredStyle: .alert)
                    alert.addAction(UIAlertAction(title: "Ok", style: .default, handler: { (_) in
                        self.navigationController?.popToRootViewController(animated: true)
                    }))
                    self.present(alert, animated: true, completion: nil)
                }
            })
        }
    }
    
    fileprivate func setupEntries () {
        nameEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        nameEntry.attributedPlaceholder = NSAttributedString(string: "nombre(s)", attributes: [NSForegroundColorAttributeName: UIColor.lightGray.withAlphaComponent(0.8)])
        
        patNameEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        patNameEntry.attributedPlaceholder = NSAttributedString(string: "apellido paterno", attributes: [NSForegroundColorAttributeName: UIColor.lightGray.withAlphaComponent(0.8)])
        
        matNameEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        matNameEntry.attributedPlaceholder = NSAttributedString(string: "apellido materno", attributes: [NSForegroundColorAttributeName: UIColor.lightGray.withAlphaComponent(0.8)])
        
        emailEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        emailEntry.attributedPlaceholder = NSAttributedString(string: "email", attributes: [NSForegroundColorAttributeName: UIColor.lightGray.withAlphaComponent(0.8)])
        
        passwordEntry.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
        passwordEntry.attributedPlaceholder = NSAttributedString(string: "password", attributes: [NSForegroundColorAttributeName: UIColor.lightGray.withAlphaComponent(0.8)])
    }
    
}
