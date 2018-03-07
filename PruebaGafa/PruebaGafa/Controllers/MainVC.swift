//
//  MainVC.swift
//  PruebaGafa
//
//  Created by Gerardo Mathus on 06/03/18.
//  Copyright © 2018 Alfonso Reyna. All rights reserved.
//

import UIKit

class MainVC: UIViewController {

    @IBOutlet weak var registerButton: UIButton!
    @IBOutlet weak var loginButton: UIButton!
    
    @IBOutlet weak var linkButton: UIButton!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        self.navigationItem.backBarButtonItem?.title = "Atras"
        self.navigationController?.navigationBar.setBackgroundImage(UIImage(), for: .default)
        self.navigationController?.navigationBar.shadowImage = UIImage()
        self.navigationController?.navigationBar.isTranslucent = false
        self.navigationController?.view.backgroundColor = .clear
        setupButtons()
    }
    
    fileprivate func setupButtons () {
        registerButton.layer.cornerRadius = registerButton.frame.size.height / 2
        loginButton.layer.cornerRadius = loginButton.frame.size.height / 2
        
        registerButton.clipsToBounds = true
        loginButton.clipsToBounds = true
        
        registerButton.addTarget(self, action: #selector(toRegister), for: .touchUpInside)
        loginButton.addTarget(self, action: #selector(toLogin), for: .touchUpInside)
        
        linkButton.addBorder(toSide: .Bottom, withColor: UIColor.gray.cgColor, andThickness: 1.0)
    }
    
    func toLogin () {
        self.performSegue(withIdentifier: "loginSegue", sender: self)
    }
    
    func toRegister () {
        self.performSegue(withIdentifier: "registerSegue", sender: self)
    }
    
}
