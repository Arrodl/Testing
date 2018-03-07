//
//  User.swift
//  PruebaGafa
//
//  Created by Gerardo Mathus on 06/03/18.
//  Copyright © 2018 Alfonso Reyna. All rights reserved.
//

import Foundation

class User : NSObject, Base {
    
    var id_user : String?
    var userName : String?
    var userPatName : String?
    var userMatName : String?
    var password : String?
    var email : String?
    var status : Int?
    
    override init() {}
    
    /** Creates a new instance of user
    */
    init(name : String,
         patName : String,
         matName : String,
         password : String,
         email : String,
         status : Int) {
        self.userName = name
        self.userPatName = patName
        self.userMatName = matName
        self.password = password
        self.email = email
        self.status = status
    }
    
    /** Inits from json
    */
    init (json: [String : Any]) {
        if let user_id : String = json["id_user"] as? String {
            self.id_user = user_id
        }
        if let name : String = json["names"] as? String {
            self.userName = name
        }
        if let email : String = json["email"] as? String {
            self.email = email
        }
        if let password : String = json["password"] as? String {
            self.password = password
        }
        if let patName : String = json["user_first_surname"] as? String {
            self.userPatName = patName
        }
        if let matName : String = json["user_second_surname"] as? String {
            self.userMatName = matName
        }
        if let status : Int = json["status"] as? Int {
            self.status = status
        }
    }
    
    /** Parses instance to json
    */
    func toJSON() -> [String : Any] {
        let json : [String : Any] = ["email" : email!,
                                     "password" : password!,
                                     "password_confirmation" : password!,
                                     "apellido_paterno" : userPatName!,
                                     "apellido_materno" : userMatName!,
                                     "provider" : "email",
                                     "uid" : email!]
        return json
    }
    
    func toString() -> String {
        return "email=\(email!)&password=\(password!)&names=\(userName!)&user_first_surname=\(userPatName!)&user_second_surname=\(userMatName!)&status=\(status!)"
    }
    
    func toStringForUpdate () -> String {
        return "id_user=\(id_user!)&email=\(email!)&password=\(password!)&names=\(userName!)&user_first_surname=\(userPatName!)&user_second_surname=\(userMatName!)"
    }
}
