//
//  BaseModel.swift
//  PruebaGafa
//
//  Created by Gerardo Mathus on 06/03/18.
//  Copyright © 2018 Alfonso Reyna. All rights reserved.
//

import Foundation

class BaseModel {
    
    static public func getDatabaseURL() -> String {
        return "http://heroguest.herokuapp.com/"
    }
    
    public enum dataTables : String {
        case Users = "users"
    }
    
}
